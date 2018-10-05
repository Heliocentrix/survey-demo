import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { SurveyCategory } from './survey-category';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { Response, Headers } from '@angular/http';
import { Survey } from './survey';
import { Router } from '@angular/router';
import {Observable} from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class DataService {

  constructor(private http: HttpClient, private router: Router) { }
  private headers = new Headers({'Content-Type': 'application/json'});
  // public base_url = 'http://localhost:8000/api';
  public base_url = 'http://laravel-backend-survey.loc/api';
  public url = 'http://laravel-backend-survey.loc';
  public survey_questions: Survey<any>[] = [];

  // getQuestions() {

  // }


  public getCurrentSurvey(): Observable<Survey<any>[]> {
    return this.http.get<Survey<any>[]>(this.base_url + this.router.url);
  }


  getSurveyUrl(data) {

    return this.http.get<Survey<any>[]>(this.base_url + data);
  }

  getSurveyCategory() {
    return this.http.get(this.base_url + '/survey_category');
  }

  postSurveyCategory(data) {
    console.log(data);
    return this.http.post(this.base_url + '/survey_category/submit', data);
  }


}
