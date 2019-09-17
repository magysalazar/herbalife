// The file contents for the current environment will overwrite these during build.
// The build system defaults to the dev environment which uses `environment.ts`, but if you do
// `ng build --env=prod` then `environment.prod.ts` will be used instead.
// The list of which env maps to which file can be found in `.angular-cli.json`.

export const environment = {
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
