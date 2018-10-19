import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { DataService } from '../data.service';
import { Survey } from '../survey';
import { QuestionBase } from '../question-base';

import { FormGroup, FormBuilder, FormControl, FormArray, Validators} from '@angular/forms';
import { forEach } from '@angular/router/src/utils/collection';


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

  constructor(private router: Router, private dataService: DataService, private fb: FormBuilder) {
  }

  ngOnInit() {
    this.getSurvey();

  }

  getSurvey() {

    const questionsArray = [];

    const q = [];
    this.dataService.getCurrentSurvey().subscribe(surveys => {
      this.surveys = surveys;
      this.survey_questions = q;

      // push question to array
      for (let i = 0; i < surveys[0].survey_questions.length; i++) {
        questionsArray.push(this.buidlData(surveys[0].survey_questions[i]));
        q.push(surveys[0].survey_questions[i].question);
      }

      console.log(this.survey_questions);

      // build the form
      this.surveyForm = this.fb.group({
        survey_id: new FormControl(this.surveys[0].id),
        email: new FormControl(null),
        questions: this.fb.array(questionsArray),

      });
    });

  }


  get questions() {
    return this.surveyForm.get('questions') as FormArray;
  }

  get options() {
    return this.surveyForm.get('options') as FormArray;
  }



  onSubmit() {
    console.log(this.surveyForm.value);

    this.dataService.submitAnswers(this.surveyForm.value).subscribe(data => {

      if (data['success']) {
        this.router.navigate(['/response']);
      } else {
        console.log(data);
      }

    });
  }

  buidlData(questions): FormGroup {

    const allOptions: FormArray = new FormArray([]);
    for (let i = 0; i < questions.question.options.length; i++) {
      const fg = new FormGroup({});
      fg.addControl('id', new FormControl(questions.question.options[i].id));
      fg.addControl('text', new FormControl(questions.question.options[i].text));
      fg.addControl('value', new FormControl());
      allOptions.push(fg);
    }


    return this.fb.group({
      title: [questions.question.title],
      type: [questions.question.question_type],
      // options: [questions.question.options],
      id: [questions.question.id],
      options: allOptions,
      value: ['']
    });

  }





}
