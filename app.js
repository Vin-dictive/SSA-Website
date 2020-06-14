const express = require('express');
const app = express();
const path = require('path');
const bodyParser = require("body-parser");
const nodemailer = require('nodemailer'); 
app.use(bodyParser.urlencoded({extended : true}));
const router = express.Router();

app.set('view engine','pug');

app.use('/assets', express.static('assets'));

router.get('/',function(req,res){
  res.sendFile(path.join(__dirname+'/index.html'));
});

router.get('/about',function(req,res){
  res.sendFile(path.join(__dirname+'/about.html'));
});

router.get('/enquiry',function(req,res){
  res.sendFile(path.join(__dirname+'/enquiry.html'));
});

router.get('/product',function(req,res){
    res.sendFile(path.join(__dirname+'/product.html'));
  });

router.get('/clients',function(req,res){
res.sendFile(path.join(__dirname+'/clients.html'));
});

router.get('/success',function(req,res){
    res.sendFile(path.join(__dirname+'/success.html'));
});

router.post('/submit',function(req,res){
    console.log("You have reached form");
    console.log(req.body.name);
    let mailTransporter = nodemailer.createTransport({ 
        service: 'gmail', 
        auth: { 
            user: '', 
            pass: ''
        } 
    }); 
      
    let mailDetails = { 
        from: '', 
        to: '', 
        subject: 'Enquiry SSA Website mail', 
        text: `${req.body}`
    }; 
      
    mailTransporter.sendMail(mailDetails, function(err, data) { 
        if(err) { 
            console.log('Error Occurs'); 
        } else { 
            console.log('Email sent successfully'); 
            res.redirect('/success')
        } 
    }); 
})

//add the router
app.use('/', router);
app.listen(process.env.port || 3000);

console.log('Running at Port 3000');