// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getFirestore, collection, addDoc } from "firebase/firestore"; 

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyBkeUU-9LYF5hFX4eE0PZYoqWDkQul_4XY",
  authDomain: "auth-firebase-projeto-au-4c8c9.firebaseapp.com",
  projectId: "auth-firebase-projeto-au-4c8c9",
  storageBucket: "auth-firebase-projeto-au-4c8c9.appspot.com",
  messagingSenderId: "111637510146",
  appId: "1:111637510146:web:4393b271738d9391f98f1b"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const db = getFirestore(app);

// Function to send form data to Firestore
async function sendFormDataToFirestore(formData) {
  try {
    await addDoc(collection(db, "econnect", "faleConosco"), formData);
    console.log("Document successfully written!");
  } catch (error) {
    console.error("Error writing document: ", error);
  }
}

// Event listener for the form submit button
document.querySelector('.submit-button').addEventListener('click', (e) => {
  e.preventDefault(); // Prevent default form submission

  // Capture form data using the IDs from the second form
  const name = document.getElementById('name').value;
  const email = document.getElementById('email').value;
  const message = document.getElementById('message').value;

  // Create an object with the form data
  const formData = {
    name: name,
    email: email,
    message: message
  };

  // Send the form data to Firestore
  sendFormDataToFirestore(formData);
});
