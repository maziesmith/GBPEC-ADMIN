<?php


include("seo.php");

$seo = new SEO(array(
    "title" => "University Management System",
    "keywords" => "Internship india, Internship in Mumbai, The Internship, Internship training, Internship in bangalore, Summer internship india" ,
    "description" => "Apply to thousands of Internships in Mumbai, bangalore, delhi, chennai, hyderabad for B.Tech, MBA, etc Students",
    "author" => "https://plus.google.com/107837531266258418226",
    "robots" => "INDEX,UNFOLLOW",
    "photo" => CDN . "images/logo.png"
));

framework\Registry::set("seo", $seo);