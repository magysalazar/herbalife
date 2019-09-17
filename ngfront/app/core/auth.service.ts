import {Injectable} from "@angular/core";
import {Router} from "@angular/router";

// Angular Firebase
import {AngularFireAuth} from "angularfire2/auth";
import {AngularFireDatabase, AngularFireList} from "angularfire2/database";
import {Observable} from "rxjs/Observable";
import * as firebase from "firebase";
import 'rxjs/add/operator/switchMap'


interface User {
    uid: string;
    name: string;
    email: string;
    photoUrl?: string;
}

export class Usuario {
    constructor(
        public uid:string,
        public name:string,
        public email:string,
        public phoneNumbber:string,
        public photoURL:string,
        public creationTime:string,
        public lastSignInTime:string,
        public providerData:object
    ) { }
}

@Injectable()

export class AuthService {

    public user: Observable<User>;
    public users: AngularFireList<Usuario>;
    public oUsers:Observable<any[]>;
    public authState: AngularFireAuth = null;

    constructor(private afAuth: AngularFireAuth,
                private db: AngularFireDatabase,
                private router: Router) {
        this.oUsers = db.list('users').valueChanges();
        this.users  = db.list('users');

        //// Get auth data, then get firestore user document || null
        this.user = this.afAuth.authState
            .switchMap(user => {
                if (user) {
                    return this.db.list<User>(`users/${user.uid}`).valueChanges()
                } else {
                    return Observable.of(null)
                }
            })
    }

    signUp(email: string, password: string){
        this.afAuth
            .auth
            .createUserAndRetrieveDataWithEmailAndPassword(email, password)
            .then((credential) => {
                console.log('Se logueo, credenciales: ', credential);
                this.updateData(credential);
                this.router.navigate(['home']);
            })
            .catch(err => {
                console.log('Algo salio mal:',err.message)
            });
    }

    login(email: string, password: string){
        console.log(email);
        this.afAuth
            .auth
            .signInAndRetrieveDataWithEmailAndPassword(email, password)
            .then((credential) => {
                this.router.navigate(['home']);
            })
            .catch(err => {
                console.log('Algo salio mal:',err.message);
            });
    }

    logout(){
        this.afAuth.auth.signOut();
        this.router.navigate(['login'])
    }

    // Login Social Media

    googleLogin() {
        const provider = new firebase.auth.GoogleAuthProvider();
        return this.oAuthLogin(provider);
    }

    facebookLogin() {
        const provider = new firebase.auth.FacebookAuthProvider();
        return this.oAuthLogin(provider);
    }

    twitterLogin() {
        const provider = new firebase.auth.TwitterAuthProvider();
        return this.oAuthLogin(provider);
    }

    signOut() {
        this.afAuth.auth.signOut().then(() => {
            this.router.navigate(['home']);
        });
    }

    // Returns true if user is logged in
    get authenticated(): boolean {
        return this.authState !== null;
    }

    // Returns current user
    get currentUser(): any {
        return this.authenticated ? this.authState.auth : null;
    }

    // helpers

    private oAuthLogin(provider) {
        return this.afAuth.auth.signInWithPopup(provider)
            .then((credential) => {
                this.updateData(credential);
                this.router.navigate(['home']);
            })
            .catch(err => {
                console.log('Algo salio mal:',err.message)
            });
    }

    private updateData(credential){
        let newUser = new Usuario(
            credential.user.uid,
            credential.user.displayName,
            credential.user.email,
            credential.user.phoneNumber,
            credential.user.photoURL,
            credential.user.metadata.creationTime,
            credential.user.metadata.lastSignInTime,
            credential.user.providerData[0]
        );
        this.users.push(newUser);
    }
}