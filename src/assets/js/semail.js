const conatctForm = document.querySelector(".formMail");

var email = document.getElementById("email");
var subject = document.getElementById("subject");
var message = document.getElementById("message");

if (conatctForm) {
  conatctForm.addEventListener("submit", (e) => {
    e.addEventListener();

    var dataemail = {
        email: email.value,
        subject: subject.value,
        message: message.value,
    };

    console.log("ok", dataemail);
  });
} else {
  console.log("vide", email);
}

/* <script src="https://smtpjs.com/v3/smtp.js"></script>


async function sendEmail() {
	Email.send({
	Host: "smtp.gmail.com",
	Username : "<sender’s email address>",
	Password : "<email password>",
	To : '<recipient’s email address>',
	From : "<sender’s email address>",
	Subject : "<email subject>",
	Body : "<email body>",
	}).then(
		message => alert("mail sent successfully")
	);
} */

// const express = require('express');
// const nodemailer = require('nodemailer');
// const crd = require('./credn')
// const app = express();
// const port = 3001;

// //Middleware
// app.use(express.static('src/components/email'))

// app.get('/', (req, res) => {
// 	res.sendFile(__dirname +'src/components/ContactApp.vue');
// });

// app.get('send', (req, res) =>{
// res.send(req.query);

// let name = req.query.name;
// let email = req.query.email;
// let message = req.query.message;

// const mail = nodemailer.createTransport({
// 	host: "smtp.gmail.com",
// 	port: 587,
// 	secure:false,
// 	auth:{
// 		user:crd.user,
// 		pass:crd.pass
// 	}

// });
// mail.sendMail({
// 	from:'brahimlion38@gmail.com',
// 	to:[email],
// 	subject:name,
// 	html:message
// }, (err) => {
// 	if (err) throw err;
// 	res.send('Mail has ben sent')
// })

// });

// app.listen(port, (err) => {
// 	if(err)
// 	throw err;
// 	console.log('Server is running at port %d', port);
// });ContactApp
