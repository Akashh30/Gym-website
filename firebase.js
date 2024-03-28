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
const database = firebase.database();

//Sign Up function
const signUp = () => {
  const fname = document.getElementById("infoName").value;
  const addr = document.getElementById("infoAddr").value;
  const pin = document.getElementById("infoPin").value;
  const email = document.getElementById("infoMail").value;
  const password = document.getElementById("infoPass").value;
  const plan=document.getElementById("priceResume").innerText;
  const TotalPrice=document.getElementById("totalPrice").innerText;
  const phone = document.getElementById("infoNumber").value;
  




  console.log(fname, addr, pin, email, password, phone,TotalPrice,plan)

  //firebase code
  firebase.auth().createUserWithEmailAndPassword(email, password)
    .then((result) => {

      var user = auth.currentUser

      // Adding to the database
      var database_ref = database.ref()

      // create user data
      var user_data = {
        infoName: fname,
        infoAddr: addr,
        infoPin: pin,
        infoMail: email,
        infoPass: password,
        infoNumber: phone,
        TotalPrice:TotalPrice,
        plan:plan

      }

      database_ref.child('users/' + user.uid).set(user_data)

      // Signed up
      document.write("You are signed up")
      console.log(result)
      // ...
    })
    .catch((error) => {
      console.log(error.code);
      console.log(error.message)
      // ..
    });
}

//Sign In function
const signIn = () => {
  const email = document.getElementById("email1").value;
  const password = document.getElementById("password1").value;

  //firebase code
  firebase.auth().signInWithEmailAndPassword(email, password)
    .then((result) => {
      // Signed in
      document.write("You are signed In")
      console.log(result)
      // ...
    })
    .catch((error) => {
      console.log(error.code);
      console.log(error.message)
    });

}

