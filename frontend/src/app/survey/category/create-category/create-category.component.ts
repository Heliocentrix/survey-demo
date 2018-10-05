import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { COMPOSITION_BUFFER_MODE } from '@angular/forms/src/directives/default_value_accessor';

import { DataService } from '../../../data.service';
@Component({
  selector: 'app-create-category',
  templateUrl: './create-category.component.html',
  styleUrls: ['./create-category.component.css']
})
export class CreateCategoryComponent implements OnInit {

  createSurveyCategoryForm: FormGroup;

  constructor(private formBuilder: FormBuilder, private router: Router, private dataService: DataService) { }

  ngOnInit() {
    this.createSurveyCategoryForm = this.formBuilder.group({
      name: ['', Validators.required],
      description: ['', Validators.required]

    });
  }
  get f() { return this.createSurveyCategoryForm.controls; }

  createSurveyCategory() {
    this.dataService.postSurveyCategory(this.createSurveyCategoryForm.value).subscribe(data => {
      console.log(data);
  });


  }
}
