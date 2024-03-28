//setting firebase with our website

const firebaseConfig = {
    apiKey: "AIzaSyATKP9u26nkElAC4jmZbne9rj9RodAXsEU",
    authDomain: "gymfreaks-1159b.firebaseapp.com",
    databaseURL: "https://gymfreaks-1159b-default-rtdb.firebaseio.com",
    projectId: "gymfreaks-1159b",
    storageBucket: "gymfreaks-1159b.appspot.com",
    messagingSenderId: "722222050896",
    appId: "1:722222050896:web:bc75622d02634777a5ab55"
};

firebase.initializeApp(firebaseConfig);

const auth = firebase.auth();

//Forgot Password function
const forgotpass = () => {
    const email = document.getElementById("email2").value;

    //firebase code
    firebase.auth().sendPasswordResetEmail(email)
        .then(() => {
            alert("Reset link sent to your Email ID")
        })
        .catch((error) => {
            console.log(error.code);
            console.log(error.message)
        });
}