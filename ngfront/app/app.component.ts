import {Component, ElementRef, OnInit, ViewChild} from '@angular/core';
import {AuthService} from "./core/auth.service";
import {AngularFireAuth, AngularFireAuthModule} from "angularfire2/auth";
import {ActivatedRoute} from "@angular/router";
import {AngularFirestore, AngularFirestoreDocument} from "angularfire2/firestore";
import {Observable} from "rxjs/Observable";

interface User {
    uid:string,
    email: string;
    displayName:string,
    photoUrl:string,
    posts:object
}
interface UserId extends User {
    id: string;
}

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})

export class AppComponent implements OnInit{

    @ViewChild("btnEmail", {read: ElementRef}) btnEmail: ElementRef;
    @ViewChild("btnPerfil", {read: ElementRef}) btnPerfil: ElementRef;
    @ViewChild("txtPassword", {read: ElementRef}) txtPassword: ElementRef;
    @ViewChild("txtEmail", {read: ElementRef}) txtEmail: ElementRef;

    auth:object;
    titulo: string;
    email: string;
    password: string;

    userDoc: AngularFirestoreDocument<User>;
    singleUser: Observable<User>;
    userId:string;
    userEmail:string;
    userName:string;
    user:object;

    constructor(
        public afAuth: AngularFireAuth,
        public route: ActivatedRoute,
        private  afs: AngularFirestore,
        public authService: AuthService
    ) {
        console.log(document.location.protocol +'//'+ document.location.hostname);
        route.paramMap.subscribe(
            params => this.userId = params.get('id')
        );
        this.userDoc = this.afs.doc('users/'+this.userId);
        this.singleUser = this.userDoc.valueChanges();
        this.user = this.singleUser;

        this.afAuth.authState.subscribe(user => {
            if(user){
                this.userId = user.uid;
                this.userEmail = user.email;
                this.userName = user.displayName;
            }
        });
    }

    ngOnInit(){
        this.auth = this.afAuth;
        this.afAuth.auth.onAuthStateChanged((user) => {
            this.user = user;

            if (user) {
                this.btnPerfil.nativeElement.classList.remove('d-none');
                //this.btnEmail.nativeElement.innerHTML = user.email
            } else {
                this.btnPerfil.nativeElement.classList.add('d-none');
                //this.btnEmail.nativeElement.innerHTML = '';
            }
        });
    }

    signUp() {
        if(this.email == undefined){
            this.email = this.txtEmail.nativeElement.value;
        }
        if(this.password == undefined ){
            this.password = this.txtPassword.nativeElement.value;
        }
        this.authService.signUp(this.email, this.password);
        this.email = this.password = '';
    }

    login() {
        if(this.email == undefined){
            this.email = this.txtEmail.nativeElement.value;
        }
        if(this.password == undefined ){
            this.password = this.txtPassword.nativeElement.value;
        }
        this.authService.login(this.email, this.password);
        this.email = this.password = '';
    }

    logout() {
        this.authService.logout();
    }

}
