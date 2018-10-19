import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';

import { DashboardComponent } from './dashboard/dashboard.component';
import { LoginComponent } from './login/login.component';
import { CreateComponent } from './survey/create/create.component';
import { CreateCategoryComponent } from './survey/category/create-category/create-category.component';
import { UrlComponent } from './url/url.component';
import { DynamicSurveyComponent } from './dynamic-survey/dynamic-survey.component'
const routes: Routes = [
  { path: '', redirectTo: '/login', pathMatch: 'full' },
  { path: 'dashboard', component: DashboardComponent },
  { path: 'login', component: LoginComponent },
  { path: 'response', component: DynamicSurveyComponent },
  { path: 'survey/create', component: CreateComponent },
  { path: 'survey/category/create', component: CreateCategoryComponent },
  // { path: '/', component: CreateCategoryComponent },
  {path: '**', component: UrlComponent}


];

@NgModule({
  imports: [ RouterModule.forRoot(routes) ],
  exports: [RouterModule]
})
export class AppRoutingModule { }
