import { ModuleWithProviders } from '@angular/core';
import { Routes, RouterModule, UrlSegment} from "@angular/router";

// Core
import {AuthGuard} from "./core/auth.guard";

// Componentes
import {HomeComponent } from "./home/home.component";
import {ErrorComponent} from "./error/error.component";
import {LoginComponent} from "./login/login.component";
import {AdminComponent} from "./admin/admin.component";


var rootpath = window.location.pathname.substring(1,window.location.pathname.length);
const appRoutes: Routes = [
    {path: '', component: HomeComponent, canActivate: [AuthGuard]},
    {path: 'login', component: LoginComponent },
    {path: 'admin', component: AdminComponent, canActivate: [AuthGuard]},
    {path: 'home', component:HomeComponent, canActivate: [AuthGuard]},
    {path: '**', component: ErrorComponent, canActivate: [AuthGuard] }

];

export const appRoutingProviders: any[] = [];
export const routing: ModuleWithProviders = RouterModule.forRoot(appRoutes);
