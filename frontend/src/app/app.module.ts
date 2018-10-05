import { BrowserModule } from '@angular/platform-browser';
import { NgModule, APP_INITIALIZER } from '@angular/core';
import { RouterModule, Routes, Router } from '@angular/router';
import { AuthGuard } from './auth.guard';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';


import { AppComponent } from './app.component';
import { LoginComponent } from './login/login.component';
import { NavComponent } from './partials/nav/nav.component';
import { DashboardComponent } from './dashboard/dashboard.component';
import { AppRoutingModule } from './/app-routing.module';
import { CreateComponent } from './survey/create/create.component';
import { CreateCategoryComponent } from './survey/category/create-category/create-category.component';

import { DataService } from './data.service';
import { OnInit } from '@angular/core/src/metadata/lifecycle_hooks';
import { UrlComponent } from './url/url.component';
import { DynamicSurveyComponent } from './dynamic-survey/dynamic-survey.component';

@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    NavComponent,
    DashboardComponent,
    CreateComponent,
    CreateCategoryComponent,
    UrlComponent,
    DynamicSurveyComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    ReactiveFormsModule,
    AppRoutingModule,
    AppRoutingModule,
    HttpClientModule
  ],
  providers: [
    AuthGuard,
    DataService,
    {
      provide: APP_INITIALIZER,
      useFactory: onAppInit,
      multi: true,
      deps: []
    },
  ],
  bootstrap: [AppComponent]
})
export class AppModule  {}
export function onAppInit(): () => Promise<any> {
  return (): Promise<any> => {
    return new Promise((resolve, reject) => {

      console.log('adasdas');

      setTimeout(() => {
        console.log('asasdasdsdasdsda');
        // doing something
        // ...
        resolve();
      }, 500);
    });
  };

}
