webpackJsonp(["main"],{

/***/ "./ngfront/$$_lazy_route_resource lazy recursive":
/***/ (function(module, exports) {

function webpackEmptyAsyncContext(req) {
	// Here Promise.resolve().then() is used instead of new Promise() to prevent
	// uncatched exception popping up in devtools
	return Promise.resolve().then(function() {
		throw new Error("Cannot find module '" + req + "'.");
	});
}
webpackEmptyAsyncContext.keys = function() { return []; };
webpackEmptyAsyncContext.resolve = webpackEmptyAsyncContext;
module.exports = webpackEmptyAsyncContext;
webpackEmptyAsyncContext.id = "./ngfront/$$_lazy_route_resource lazy recursive";

/***/ }),

/***/ "./ngfront/app/admin/admin.component.css":
/***/ (function(module, exports) {

module.exports = ""

/***/ }),

/***/ "./ngfront/app/admin/admin.component.html":
/***/ (function(module, exports) {

module.exports = "<p>\r\n  admin works!\r\n</p>\r\n"

/***/ }),

/***/ "./ngfront/app/admin/admin.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AdminComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};

var AdminComponent = /** @class */ (function () {
    function AdminComponent() {
    }
    AdminComponent.prototype.ngOnInit = function () {
    };
    AdminComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-admin',
            template: __webpack_require__("./ngfront/app/admin/admin.component.html"),
            styles: [__webpack_require__("./ngfront/app/admin/admin.component.css")]
        }),
        __metadata("design:paramtypes", [])
    ], AdminComponent);
    return AdminComponent;
}());



/***/ }),

/***/ "./ngfront/app/app.component.css":
/***/ (function(module, exports) {

module.exports = ".full-width{\r\n    width: 100%!important;\r\n}\r\n.nav-logo{\r\n    height: 25px;\r\n}\r\n.container-main{\r\n    height:80vh;\r\n}"

/***/ }),

/***/ "./ngfront/app/app.component.html":
/***/ (function(module, exports) {

module.exports = "<nav class=\"navbar navbar-expand-lg navbar-dark bg-primary rounded\">\r\n    <a id=\"btnTimeline\" class=\"navbar-brand\" [routerLink]=\"['/']\"><img class=\"nav-logo\" a src=\"../assets/herbalife-nutrition-logo.png\" alt=\"\"></a>\r\n\r\n    <ul class=\"navbar-nav ml-auto\">\r\n\r\n        <li #btnPerfil class=\"nav-item dropdown float-right d-none\">\r\n            <a #btnEmail class=\"nav-link dropdown-toggle\" href=\"#\"\r\n               data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">{{userEmail}}</a>\r\n            <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdownMenuLink\">\r\n                <a class=\"dropdown-item\" href=\"users/{{userId}}\" (click)=\"getUser(userId)\">Mi perfil</a>\r\n                <a class=\"dropdown-item\" href=\"#\" #btnLogout (click)=\"authService.logout()\">Logout</a>\r\n            </div>\r\n        </li>\r\n    </ul>\r\n</nav>\r\n\r\n<!-- Page Content -->\r\n<div class=\"container container-main\">\r\n    <div class=\"row\">\r\n        <div class=\"col-md-12\">\r\n            <router-outlet></router-outlet>\r\n        </div>\r\n    </div>\r\n    <!-- /.row -->\r\n</div>\r\n<!-- /.container -->\r\n\r\n\r\n<!-- Footer -->\r\n<footer class=\"py-5 bg-dark\">\r\n    <div class=\"container\">\r\n        <p class=\"m-0 text-center text-white\">Copyright &copy; Your Website 2018</p>\r\n    </div>\r\n    <!-- /.container -->\r\n</footer>"

/***/ }),

/***/ "./ngfront/app/app.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AppComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__core_auth_service__ = __webpack_require__("./ngfront/app/core/auth.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_angularfire2_auth__ = __webpack_require__("./node_modules/angularfire2/auth/index.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__angular_router__ = __webpack_require__("./node_modules/@angular/router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4_angularfire2_firestore__ = __webpack_require__("./node_modules/angularfire2/firestore/index.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};





var AppComponent = /** @class */ (function () {
    function AppComponent(afAuth, route, afs, authService) {
        var _this = this;
        this.afAuth = afAuth;
        this.route = route;
        this.afs = afs;
        this.authService = authService;
        console.log(document.location.protocol + '//' + document.location.hostname);
        route.paramMap.subscribe(function (params) { return _this.userId = params.get('id'); });
        this.userDoc = this.afs.doc('users/' + this.userId);
        this.singleUser = this.userDoc.valueChanges();
        this.user = this.singleUser;
        this.afAuth.authState.subscribe(function (user) {
            if (user) {
                _this.userId = user.uid;
                _this.userEmail = user.email;
                _this.userName = user.displayName;
            }
        });
    }
    AppComponent.prototype.ngOnInit = function () {
        var _this = this;
        this.auth = this.afAuth;
        this.afAuth.auth.onAuthStateChanged(function (user) {
            _this.user = user;
            if (user) {
                _this.btnPerfil.nativeElement.classList.remove('d-none');
                //this.btnEmail.nativeElement.innerHTML = user.email
            }
            else {
                _this.btnPerfil.nativeElement.classList.add('d-none');
                //this.btnEmail.nativeElement.innerHTML = '';
            }
        });
    };
    AppComponent.prototype.signUp = function () {
        if (this.email == undefined) {
            this.email = this.txtEmail.nativeElement.value;
        }
        if (this.password == undefined) {
            this.password = this.txtPassword.nativeElement.value;
        }
        this.authService.signUp(this.email, this.password);
        this.email = this.password = '';
    };
    AppComponent.prototype.login = function () {
        if (this.email == undefined) {
            this.email = this.txtEmail.nativeElement.value;
        }
        if (this.password == undefined) {
            this.password = this.txtPassword.nativeElement.value;
        }
        this.authService.login(this.email, this.password);
        this.email = this.password = '';
    };
    AppComponent.prototype.logout = function () {
        this.authService.logout();
    };
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_9" /* ViewChild */])("btnEmail", { read: __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */] }),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], AppComponent.prototype, "btnEmail", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_9" /* ViewChild */])("btnPerfil", { read: __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */] }),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], AppComponent.prototype, "btnPerfil", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_9" /* ViewChild */])("txtPassword", { read: __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */] }),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], AppComponent.prototype, "txtPassword", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_9" /* ViewChild */])("txtEmail", { read: __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */] }),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], AppComponent.prototype, "txtEmail", void 0);
    AppComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-root',
            template: __webpack_require__("./ngfront/app/app.component.html"),
            styles: [__webpack_require__("./ngfront/app/app.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_2_angularfire2_auth__["a" /* AngularFireAuth */],
            __WEBPACK_IMPORTED_MODULE_3__angular_router__["a" /* ActivatedRoute */],
            __WEBPACK_IMPORTED_MODULE_4_angularfire2_firestore__["a" /* AngularFirestore */],
            __WEBPACK_IMPORTED_MODULE_1__core_auth_service__["a" /* AuthService */]])
    ], AppComponent);
    return AppComponent;
}());



/***/ }),

/***/ "./ngfront/app/app.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AppModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_platform_browser__ = __webpack_require__("./node_modules/@angular/platform-browser/esm5/platform-browser.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__angular_forms__ = __webpack_require__("./node_modules/@angular/forms/esm5/forms.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__angular_http__ = __webpack_require__("./node_modules/@angular/http/esm5/http.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4_angularfire2_auth__ = __webpack_require__("./node_modules/angularfire2/auth/index.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5_angularfire2__ = __webpack_require__("./node_modules/angularfire2/index.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6_angularfire2_storage__ = __webpack_require__("./node_modules/angularfire2/storage/index.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7_angularfire2_firestore__ = __webpack_require__("./node_modules/angularfire2/firestore/index.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8_angularfire2_database__ = __webpack_require__("./node_modules/angularfire2/database/index.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_9__environments_environment__ = __webpack_require__("./ngfront/environments/environment.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_10__app_routing__ = __webpack_require__("./ngfront/app/app.routing.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_11__core_auth_guard__ = __webpack_require__("./ngfront/app/core/auth.guard.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_12__core_core_module__ = __webpack_require__("./ngfront/app/core/core.module.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_13__app_component__ = __webpack_require__("./ngfront/app/app.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_14__home_home_component__ = __webpack_require__("./ngfront/app/home/home.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_15__login_login_component__ = __webpack_require__("./ngfront/app/login/login.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_16__error_error_component__ = __webpack_require__("./ngfront/app/error/error.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_17__core_auth_service__ = __webpack_require__("./ngfront/app/core/auth.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_18__admin_admin_component__ = __webpack_require__("./ngfront/app/admin/admin.component.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};




// Firebase






// Rutas

// Core


// Componentes






// Paste in your credentials that you saved earlier
var AppModule = /** @class */ (function () {
    function AppModule() {
    }
    AppModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_1__angular_core__["I" /* NgModule */])({
            declarations: [
                __WEBPACK_IMPORTED_MODULE_13__app_component__["a" /* AppComponent */],
                __WEBPACK_IMPORTED_MODULE_15__login_login_component__["a" /* LoginComponent */],
                __WEBPACK_IMPORTED_MODULE_14__home_home_component__["a" /* HomeComponent */],
                __WEBPACK_IMPORTED_MODULE_16__error_error_component__["a" /* ErrorComponent */],
                __WEBPACK_IMPORTED_MODULE_18__admin_admin_component__["a" /* AdminComponent */],
            ],
            imports: [
                __WEBPACK_IMPORTED_MODULE_0__angular_platform_browser__["a" /* BrowserModule */],
                __WEBPACK_IMPORTED_MODULE_2__angular_forms__["a" /* FormsModule */],
                __WEBPACK_IMPORTED_MODULE_3__angular_http__["a" /* HttpModule */],
                __WEBPACK_IMPORTED_MODULE_10__app_routing__["b" /* routing */],
                __WEBPACK_IMPORTED_MODULE_12__core_core_module__["a" /* CoreModule */],
                __WEBPACK_IMPORTED_MODULE_5_angularfire2__["a" /* AngularFireModule */].initializeApp(__WEBPACK_IMPORTED_MODULE_9__environments_environment__["a" /* environment */].firebase, 'herbalife'),
                __WEBPACK_IMPORTED_MODULE_7_angularfire2_firestore__["b" /* AngularFirestoreModule */],
                __WEBPACK_IMPORTED_MODULE_6_angularfire2_storage__["a" /* AngularFireStorageModule */],
                __WEBPACK_IMPORTED_MODULE_4_angularfire2_auth__["b" /* AngularFireAuthModule */],
            ],
            providers: [
                __WEBPACK_IMPORTED_MODULE_10__app_routing__["a" /* appRoutingProviders */],
                __WEBPACK_IMPORTED_MODULE_11__core_auth_guard__["a" /* AuthGuard */],
                __WEBPACK_IMPORTED_MODULE_17__core_auth_service__["a" /* AuthService */],
                __WEBPACK_IMPORTED_MODULE_2__angular_forms__["a" /* FormsModule */],
                __WEBPACK_IMPORTED_MODULE_8_angularfire2_database__["a" /* AngularFireDatabase */],
                __WEBPACK_IMPORTED_MODULE_4_angularfire2_auth__["b" /* AngularFireAuthModule */],
                __WEBPACK_IMPORTED_MODULE_7_angularfire2_firestore__["b" /* AngularFirestoreModule */],
                __WEBPACK_IMPORTED_MODULE_6_angularfire2_storage__["a" /* AngularFireStorageModule */]
            ],
            bootstrap: [__WEBPACK_IMPORTED_MODULE_13__app_component__["a" /* AppComponent */]]
        })
    ], AppModule);
    return AppModule;
}());



/***/ }),

/***/ "./ngfront/app/app.routing.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return appRoutingProviders; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "b", function() { return routing; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_router__ = __webpack_require__("./node_modules/@angular/router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__core_auth_guard__ = __webpack_require__("./ngfront/app/core/auth.guard.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__home_home_component__ = __webpack_require__("./ngfront/app/home/home.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__error_error_component__ = __webpack_require__("./ngfront/app/error/error.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__login_login_component__ = __webpack_require__("./ngfront/app/login/login.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__admin_admin_component__ = __webpack_require__("./ngfront/app/admin/admin.component.ts");

// Core

// Componentes




var rootpath = window.location.pathname.substring(1, window.location.pathname.length);
var appRoutes = [
    { path: '', component: __WEBPACK_IMPORTED_MODULE_2__home_home_component__["a" /* HomeComponent */], canActivate: [__WEBPACK_IMPORTED_MODULE_1__core_auth_guard__["a" /* AuthGuard */]] },
    { path: 'login', component: __WEBPACK_IMPORTED_MODULE_4__login_login_component__["a" /* LoginComponent */] },
    { path: 'admin', component: __WEBPACK_IMPORTED_MODULE_5__admin_admin_component__["a" /* AdminComponent */], canActivate: [__WEBPACK_IMPORTED_MODULE_1__core_auth_guard__["a" /* AuthGuard */]] },
    { path: 'home', component: __WEBPACK_IMPORTED_MODULE_2__home_home_component__["a" /* HomeComponent */], canActivate: [__WEBPACK_IMPORTED_MODULE_1__core_auth_guard__["a" /* AuthGuard */]] },
    { path: '**', component: __WEBPACK_IMPORTED_MODULE_3__error_error_component__["a" /* ErrorComponent */], canActivate: [__WEBPACK_IMPORTED_MODULE_1__core_auth_guard__["a" /* AuthGuard */]] }
];
var appRoutingProviders = [];
var routing = __WEBPACK_IMPORTED_MODULE_0__angular_router__["c" /* RouterModule */].forRoot(appRoutes);


/***/ }),

/***/ "./ngfront/app/core/auth.guard.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AuthGuard; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_router__ = __webpack_require__("./node_modules/@angular/router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__auth_service__ = __webpack_require__("./ngfront/app/core/auth.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_rxjs_add_operator_do__ = __webpack_require__("./node_modules/rxjs/_esm5/add/operator/do.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4_rxjs_add_operator_map__ = __webpack_require__("./node_modules/rxjs/_esm5/add/operator/map.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5_rxjs_add_operator_take__ = __webpack_require__("./node_modules/rxjs/_esm5/add/operator/take.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};






var AuthGuard = /** @class */ (function () {
    function AuthGuard(auth, router) {
        this.auth = auth;
        this.router = router;
    }
    AuthGuard.prototype.canActivate = function (next, state) {
        var _this = this;
        console.log(this.router.url);
        return this.auth.user
            .take(1)
            .map(function (user) { return !!user; })
            .do(function (loggedIn) {
            if (!loggedIn) {
                console.log('Acceso Denegado');
                console.log(window.location);
                console.log(window.location.href);
                console.log(window.location.host);
                console.log(window.location.hostname);
                console.log(window.location.pathname);
                console.log(window.location.origin);
                _this.router.navigate(['login']);
            }
        });
    };
    AuthGuard = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["A" /* Injectable */])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_2__auth_service__["a" /* AuthService */], __WEBPACK_IMPORTED_MODULE_1__angular_router__["b" /* Router */]])
    ], AuthGuard);
    return AuthGuard;
}());



/***/ }),

/***/ "./ngfront/app/core/auth.service.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* unused harmony export Usuario */
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AuthService; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_router__ = __webpack_require__("./node_modules/@angular/router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_angularfire2_auth__ = __webpack_require__("./node_modules/angularfire2/auth/index.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_angularfire2_database__ = __webpack_require__("./node_modules/angularfire2/database/index.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4_rxjs_Observable__ = __webpack_require__("./node_modules/rxjs/_esm5/Observable.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5_firebase__ = __webpack_require__("./node_modules/firebase/index.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5_firebase___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_5_firebase__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6_rxjs_add_operator_switchMap__ = __webpack_require__("./node_modules/rxjs/_esm5/add/operator/switchMap.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


// Angular Firebase





var Usuario = /** @class */ (function () {
    function Usuario(uid, name, email, phoneNumbber, photoURL, creationTime, lastSignInTime, providerData) {
        this.uid = uid;
        this.name = name;
        this.email = email;
        this.phoneNumbber = phoneNumbber;
        this.photoURL = photoURL;
        this.creationTime = creationTime;
        this.lastSignInTime = lastSignInTime;
        this.providerData = providerData;
    }
    return Usuario;
}());

var AuthService = /** @class */ (function () {
    function AuthService(afAuth, db, router) {
        var _this = this;
        this.afAuth = afAuth;
        this.db = db;
        this.router = router;
        this.authState = null;
        this.oUsers = db.list('users').valueChanges();
        this.users = db.list('users');
        //// Get auth data, then get firestore user document || null
        this.user = this.afAuth.authState
            .switchMap(function (user) {
            if (user) {
                return _this.db.list("users/" + user.uid).valueChanges();
            }
            else {
                return __WEBPACK_IMPORTED_MODULE_4_rxjs_Observable__["a" /* Observable */].of(null);
            }
        });
    }
    AuthService.prototype.signUp = function (email, password) {
        var _this = this;
        this.afAuth
            .auth
            .createUserAndRetrieveDataWithEmailAndPassword(email, password)
            .then(function (credential) {
            console.log('Se logueo, credenciales: ', credential);
            _this.updateData(credential);
            _this.router.navigate(['home']);
        })
            .catch(function (err) {
            console.log('Algo salio mal:', err.message);
        });
    };
    AuthService.prototype.login = function (email, password) {
        var _this = this;
        console.log(email);
        this.afAuth
            .auth
            .signInAndRetrieveDataWithEmailAndPassword(email, password)
            .then(function (credential) {
            _this.router.navigate(['home']);
        })
            .catch(function (err) {
            console.log('Algo salio mal:', err.message);
        });
    };
    AuthService.prototype.logout = function () {
        this.afAuth.auth.signOut();
        this.router.navigate(['login']);
    };
    // Login Social Media
    AuthService.prototype.googleLogin = function () {
        var provider = new __WEBPACK_IMPORTED_MODULE_5_firebase__["auth"].GoogleAuthProvider();
        return this.oAuthLogin(provider);
    };
    AuthService.prototype.facebookLogin = function () {
        var provider = new __WEBPACK_IMPORTED_MODULE_5_firebase__["auth"].FacebookAuthProvider();
        return this.oAuthLogin(provider);
    };
    AuthService.prototype.twitterLogin = function () {
        var provider = new __WEBPACK_IMPORTED_MODULE_5_firebase__["auth"].TwitterAuthProvider();
        return this.oAuthLogin(provider);
    };
    AuthService.prototype.signOut = function () {
        var _this = this;
        this.afAuth.auth.signOut().then(function () {
            _this.router.navigate(['home']);
        });
    };
    Object.defineProperty(AuthService.prototype, "authenticated", {
        // Returns true if user is logged in
        get: function () {
            return this.authState !== null;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(AuthService.prototype, "currentUser", {
        // Returns current user
        get: function () {
            return this.authenticated ? this.authState.auth : null;
        },
        enumerable: true,
        configurable: true
    });
    // helpers
    AuthService.prototype.oAuthLogin = function (provider) {
        var _this = this;
        return this.afAuth.auth.signInWithPopup(provider)
            .then(function (credential) {
            _this.updateData(credential);
            _this.router.navigate(['home']);
        })
            .catch(function (err) {
            console.log('Algo salio mal:', err.message);
        });
    };
    AuthService.prototype.updateData = function (credential) {
        var newUser = new Usuario(credential.user.uid, credential.user.displayName, credential.user.email, credential.user.phoneNumber, credential.user.photoURL, credential.user.metadata.creationTime, credential.user.metadata.lastSignInTime, credential.user.providerData[0]);
        this.users.push(newUser);
    };
    AuthService = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["A" /* Injectable */])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_2_angularfire2_auth__["a" /* AngularFireAuth */],
            __WEBPACK_IMPORTED_MODULE_3_angularfire2_database__["a" /* AngularFireDatabase */],
            __WEBPACK_IMPORTED_MODULE_1__angular_router__["b" /* Router */]])
    ], AuthService);
    return AuthService;
}());



/***/ }),

/***/ "./ngfront/app/core/core.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return CoreModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_common__ = __webpack_require__("./node_modules/@angular/common/esm5/common.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_angularfire2_auth__ = __webpack_require__("./node_modules/angularfire2/auth/index.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_angularfire2_firestore__ = __webpack_require__("./node_modules/angularfire2/firestore/index.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__auth_service__ = __webpack_require__("./ngfront/app/core/auth.service.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};





var CoreModule = /** @class */ (function () {
    function CoreModule() {
    }
    CoreModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["I" /* NgModule */])({
            imports: [
                __WEBPACK_IMPORTED_MODULE_1__angular_common__["b" /* CommonModule */],
                __WEBPACK_IMPORTED_MODULE_2_angularfire2_auth__["b" /* AngularFireAuthModule */],
                __WEBPACK_IMPORTED_MODULE_3_angularfire2_firestore__["b" /* AngularFirestoreModule */]
            ],
            providers: [
                __WEBPACK_IMPORTED_MODULE_4__auth_service__["a" /* AuthService */]
            ],
            declarations: []
        })
    ], CoreModule);
    return CoreModule;
}());



/***/ }),

/***/ "./ngfront/app/error/error.component.css":
/***/ (function(module, exports) {

module.exports = ""

/***/ }),

/***/ "./ngfront/app/error/error.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"col-md-12\">\r\n\r\n    <div id=\"twitTimeline\" class=\"\">\r\n        <div class=\"row\">\r\n\r\n            <!-- Blog Entries Column -->\r\n            <div class=\"col-md-8\">\r\n\r\n                <h1 class=\"my-4\">{{titulo}}</h1>\r\n                <div class=\"row\">\r\n                    <div class=\"col-md-12\">\r\n                        <div class=\"error-template\">\r\n                            <h1>\r\n                                Oops!</h1>\r\n                            <h2>\r\n                                404 Not Found</h2>\r\n                            <div class=\"error-details\">\r\n                                {{titulo}}\r\n                            </div>\r\n                            <div class=\"error-actions\">\r\n                                <a href=\"http://www.jquery2dotnet.com\" class=\"btn btn-primary btn-lg\"><span\r\n                                        class=\"glyphicon glyphicon-home\"></span>\r\n                                    Take Me Home </a><a href=\"http://www.jquery2dotnet.com\"\r\n                                                        class=\"btn btn-default btn-lg\"><span\r\n                                    class=\"glyphicon glyphicon-envelope\"></span> Contact Support </a>\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n\r\n            </div>\r\n        </div>\r\n    </div>\r\n</div>\r\n"

/***/ }),

/***/ "./ngfront/app/error/error.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ErrorComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};

var ErrorComponent = /** @class */ (function () {
    function ErrorComponent() {
        this.titulo = "Error!! Pagina no encontrada.";
    }
    ErrorComponent.prototype.ngOnInit = function () {
        console.log("Componente error.component.ts cargado");
    };
    ErrorComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-error',
            template: __webpack_require__("./ngfront/app/error/error.component.html"),
            styles: [__webpack_require__("./ngfront/app/error/error.component.css")]
        }),
        __metadata("design:paramtypes", [])
    ], ErrorComponent);
    return ErrorComponent;
}());



/***/ }),

/***/ "./ngfront/app/home/home.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"col-md-12 text-center\">\r\n\r\n    <div class=\"card-body\">\r\n        <div class=\"card-body\">\r\n            <h5 class=\"card-title\">Bienvenidos a Herbalife Nutrition</h5>\r\n            <p class=\"card-text\">Mira las ultimas novedades haciendo clic en ingresar.</p>\r\n            <a href=\"posts\" class=\"btn btn-primary\" [routerLink]=\"['/posts']\">Ingresar</a>\r\n        </div>\r\n    </div>\r\n</div>\r\n"

/***/ }),

/***/ "./ngfront/app/home/home.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return HomeComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};

var HomeComponent = /** @class */ (function () {
    function HomeComponent() {
    }
    HomeComponent.prototype.ngOnInit = function () {
        console.log('Se ha cargado el componente components.ts');
    };
    HomeComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'home',
            template: __webpack_require__("./ngfront/app/home/home.component.html"),
            styleUrls: []
        }),
        __metadata("design:paramtypes", [])
    ], HomeComponent);
    return HomeComponent;
}());



/***/ }),

/***/ "./ngfront/app/login/login.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"row justify-content-center\">\r\n    <div class=\"col-4\">\r\n        <div id=\"twitLogin\" class=\"form-signin\">\r\n            <h2 for=\"formContent\" class=\"form-signin-heading\">{{titulo}}</h2>\r\n            <div id=\"alerMessage\" class=\"alert alert-warning d-none\" role=\"alert\"></div>\r\n            <div id=\"formContent\" class=\"card-body\">\r\n\r\n                <div class=\"form-group\">\r\n                    <label for=\"txtEmail\">Email address</label>\r\n                    <input type=\"email\" #txtEmail id=\"txtEmail\" class=\"form-control\" aria-describedby=\"emailHelp\"\r\n                           placeholder=\"Enter email\">\r\n                    <small id=\"emailHelp\" class=\"form-text text-muted\">We'll never share your email with anyone else.\r\n                    </small>\r\n                </div>\r\n                <div class=\"form-group\">\r\n                    <label for=\"txtPassword\">Password</label>\r\n                    <input id=\"txtPassword\" #txtPassword type=\"password\" class=\"form-control\"\r\n                           placeholder=\"Password\">\r\n                </div>\r\n                <div class=\"form-group text-center\">\r\n                    <button (click)=\"authService.googleLogin()\">\r\n                        <i class=\"ion-social-google\"></i> Google\r\n                    </button>\r\n                    <button (click)=\"authService.facebookLogin()\">\r\n                        <i class=\"ion-social-facebook\"></i> Facebook\r\n                    </button>\r\n                    <button (click)=\"authService.twitterLogin()\">\r\n                        <i class=\"ion-social-twitter\"></i> Twitter\r\n                    </button>\r\n                </div>\r\n                <div class=\"form-group text-center\">\r\n                    <button id=\"btnLogin\" #btnLogin type=\"submit\" (click)=\"login()\" class=\"btn btn-primary\">Ingresar</button>\r\n                    <button id=\"btnSignUp\" #btnSignUp type=\"submit\" (click)=\"signUp()\" class=\"btn btn-primary\">Registrarse</button>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</div>\r\n\r\n"

/***/ }),

/***/ "./ngfront/app/login/login.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return LoginComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__core_auth_service__ = __webpack_require__("./ngfront/app/core/auth.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_angularfire2_firestore__ = __webpack_require__("./node_modules/angularfire2/firestore/index.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__angular_router__ = __webpack_require__("./node_modules/@angular/router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4_angularfire2_auth__ = __webpack_require__("./node_modules/angularfire2/auth/index.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};





var LoginComponent = /** @class */ (function () {
    function LoginComponent(afs, route, afAuth, authService) {
        var _this = this;
        this.afs = afs;
        this.afAuth = afAuth;
        this.authService = authService;
        this.titulo = 'Porfavor Ingresa o Registrate';
        this.afAuth.authState.subscribe(function (user) {
            if (user) {
                _this.userId = user.uid;
                _this.email = user.email;
            }
        });
    }
    LoginComponent.prototype.ngOnInit = function () {
        console.log('Se ha cargado el componente login.ts');
    };
    LoginComponent.prototype.signUp = function () {
        if (this.email == undefined) {
            this.email = this.txtEmail.nativeElement.value;
        }
        if (this.password == undefined) {
            this.password = this.txtPassword.nativeElement.value;
        }
        console.log(this.email);
        console.log(this.password);
        this.authService.signUp(this.email, this.password);
        this.email = this.password = '';
    };
    LoginComponent.prototype.login = function () {
        if (this.email == undefined) {
            this.email = this.txtEmail.nativeElement.value;
        }
        if (this.password == undefined) {
            this.password = this.txtPassword.nativeElement.value;
        }
        console.log(this.email);
        console.log(this.password);
        this.authService.login(this.email, this.password);
        this.email = this.password = '';
    };
    LoginComponent.prototype.logout = function () {
        this.authService.logout();
    };
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_9" /* ViewChild */])("txtEmail", { read: __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */] }),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], LoginComponent.prototype, "txtEmail", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_9" /* ViewChild */])("txtPassword", { read: __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */] }),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], LoginComponent.prototype, "txtPassword", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_9" /* ViewChild */])("btnEmail", { read: __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */] }),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], LoginComponent.prototype, "btnEmail", void 0);
    LoginComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'login',
            template: __webpack_require__("./ngfront/app/login/login.component.html"),
            styleUrls: []
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_2_angularfire2_firestore__["a" /* AngularFirestore */],
            __WEBPACK_IMPORTED_MODULE_3__angular_router__["a" /* ActivatedRoute */],
            __WEBPACK_IMPORTED_MODULE_4_angularfire2_auth__["a" /* AngularFireAuth */],
            __WEBPACK_IMPORTED_MODULE_1__core_auth_service__["a" /* AuthService */]])
    ], LoginComponent);
    return LoginComponent;
}());



/***/ }),

/***/ "./ngfront/environments/environment.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return environment; });
// The file contents for the current environment will overwrite these during build.
// The build system defaults to the dev environment which uses `environment.ts`, but if you do
// `ng build --env=prod` then `environment.prod.ts` will be used instead.
// The list of which env maps to which file can be found in `.angular-cli.json`.
var environment = {
    production: false,
    firebase: {
        apiKey: "AIzaSyAchWTiBLYDeF4kc1NifjZDPeK6KL580LE",
        authDomain: "herba-life.firebaseapp.com",
        databaseURL: "https://herba-life.firebaseio.com",
        projectId: "herba-life",
        storageBucket: "herba-life.appspot.com",
        messagingSenderId: "151880377001",
        timestampsInSnapshots: true
    }
};


/***/ }),

/***/ "./ngfront/main.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_platform_browser_dynamic__ = __webpack_require__("./node_modules/@angular/platform-browser-dynamic/esm5/platform-browser-dynamic.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__app_app_module__ = __webpack_require__("./ngfront/app/app.module.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__environments_environment__ = __webpack_require__("./ngfront/environments/environment.ts");




if (__WEBPACK_IMPORTED_MODULE_3__environments_environment__["a" /* environment */].production) {
    Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_14" /* enableProdMode */])();
}
Object(__WEBPACK_IMPORTED_MODULE_1__angular_platform_browser_dynamic__["a" /* platformBrowserDynamic */])().bootstrapModule(__WEBPACK_IMPORTED_MODULE_2__app_app_module__["a" /* AppModule */])
    .catch(function (err) { return console.log(err); });


/***/ }),

/***/ 0:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("./ngfront/main.ts");


/***/ })

},[0]);
//# sourceMappingURL=main.bundle.js.map