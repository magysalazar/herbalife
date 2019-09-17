import { BrowserModule } from '@angular/platform-browser';
import {Injectable, NgModule} from '@angular/core';
import { FormsModule } from "@angular/forms";
import { HttpModule } from "@angular/http";

// Firebase
import {AngularFireAuthModule, AngularFireAuthProvider} from "angularfire2/auth";
import { AngularFireModule } from "angularfire2";
import { AngularFireStorageModule } from "angularfire2/storage";
import {AngularFirestore, AngularFirestoreModule} from "angularfire2/firestore";
import {ActivatedRouteSnapshot, RouterModule, RouterStateSnapshot} from "@angular/router";
import {AngularFireDatabase, snapshotChanges} from "angularfire2/database";
import {environment} from "../environments/environment";

// Rutas
import { routing, appRoutingProviders} from "./app.routing";

// Core
import {AuthGuard} from "./core/auth.guard";
import {CoreModule} from "./core/core.module";

// Componentes
import { AppComponent } from './app.component';
import { HomeComponent } from './home/home.component';
import { LoginComponent } from './login/login.component';
import { ErrorComponent } from './error/error.component';
import { AuthService} from "./core/auth.service";
import { AdminComponent } from './admin/admin.component';

// Paste in your credentials that you saved earlier

@NgModule({
    declarations: [
        AppComponent,
        LoginComponent,
        HomeComponent,
        ErrorComponent,
        AdminComponent,
    ],
    imports: [
        BrowserModule,
        FormsModule,
        HttpModule,
        routing,
        CoreModule,

        AngularFireModule.initializeApp(environment.firebase,'herbalife'),
        AngularFirestoreModule,
        AngularFireStorageModule,
        AngularFireAuthModule,
    ],
    providers: [
        appRoutingProviders,
        AuthGuard,
        AuthService,
        FormsModule,
        AngularFireDatabase,
        AngularFireAuthModule,
        AngularFirestoreModule,
        AngularFireStorageModule
    ],
    bootstrap: [AppComponent]
})
export class AppModule { }
