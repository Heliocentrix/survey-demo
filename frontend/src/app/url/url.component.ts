import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { DataService } from '../data.service';
import { Survey } from '../survey';
import { QuestionBase } from '../question-base';

import { FormGroup, FormBuilder, FormControl, FormArray, Validators} from '@angular/forms';


// import { url } from 'inspector';
@Component({
  selector: 'app-url',
  templateUrl: './url.component.html',
  styleUrls: ['./url.component.css']
})
export class UrlComponent implements OnInit {
  //  fg: any;
  errorMessage: string;
  public available: boolean;
  public redirect = '/dashboard';
  private url = '';
  // public survey_questions: Survey<any>[] = [];
  surveyObject: any;
  form: FormGroup;
  surveyForm: FormGroup;
  surveys: Survey<any>[];
  survey_questions: QuestionBase<any>[];
  options =  [];

  constructor(private router: Router, private dataService: DataService, private fb: FormBuilder) {
  }

  ngOnInit() {
    this.getSurvey();

  }

  getSurvey() {

    const arr = [];
    const q = [];
    this.dataService.getCurrentSurvey().subscribe(surveys => {
      this.surveys = surveys;
      this.survey_questions = q;

      // push question to array
      for (let i = 0; i < surveys[0].survey_questions.length; i++) {
        arr.push(this.buidlData(surveys[0].survey_questions[i]));
        q.push(surveys[0].survey_questions[i].question);

      }
      console.log(this.survey_questions);

      // build the form
      this.surveyForm = this.fb.group({
        survey_id: new FormControl(this.surveys[0].id),
        email: new FormControl(null),
        questions: this.fb.array(arr)
      });


    });



  }


  get questions() {
    return this.surveyForm.get('questions') as FormArray;
  }



  onSubmit() {
    console.log(this.surveyForm.value);

    this.dataService.submitAnswers(this.surveyForm.value).subscribe(data => {

      if (data['success']) {
        console.log(data);
      } else {
        console.log(data);
      }

    });
  }

  buidlData(questions): FormGroup {
    // console.log(questions.question.title);
    //// this.fg = this.fb.group(questions);
    // const fg = new FormGroup({});
    // fg.addControl(questions.question.title, new FormControl(false));
    // this.questions.push(new FormControl());

    //  const allOptions: FormArray = new FormArray([]);
    // for (let i = 0; i < questions.options.length; i++) {
    //   console.log(questions.options[i]);
    //   const fg = new FormGroup({});
    //   fg.addControl(questions.options[i].id, new FormControl(false));
    //   allOptions.push(fg);
    // }


    // console.log(questions.question.title);
    return this.fb.group({
      title: [questions.question.title],
      type: [questions.question.question_type],
      options: [questions.question.options],
      id: [questions.question.id],
      ///  options_value: allOptions,
      value: ['']
    });

  }



}
