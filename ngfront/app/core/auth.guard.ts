import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, Router} from '@angular/router';
import { AuthService} from "./auth.service";
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/do';
import 'rxjs/add/operator/map';
import 'rxjs/add/operator/take';

@Injectable()
export class AuthGuard implements CanActivate {

    constructor(private auth: AuthService, private router: Router) {}

    canActivate(
    next: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean> | Promise<boolean> | boolean {

        console.log(this.router.url);

        return this.auth.user
            .take(1)
            .map(user => !!user)
            .do(loggedIn => {
                if (!loggedIn) {
                    console.log('Acceso Denegado');
                    console.log(window.location);
                    console.log(window.location.href);
                    console.log(window.location.host);
                    console.log(window.location.hostname);
                    console.log(window.location.pathname);
                    console.log(window.location.origin);

                    this.router.navigate(['login']);
                }
            });
  }
}
