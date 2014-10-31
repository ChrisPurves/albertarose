<?php

// process inputs
$name = filter_input(INPUT_POST, 'qName', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'qEmail', FILTER_SANITIZE_EMAIL);
$country = filter_input(INPUT_POST, 'qCountry', FILTER_SANITIZE_STRING);
$education = filter_input(INPUT_POST, 'qEducation', FILTER_SANITIZE_STRING);
$university = filter_input(INPUT_POST, 'qUniversity', FILTER_SANITIZE_STRING);
$study = filter_input(INPUT_POST, 'qStudy', FILTER_SANITIZE_STRING);
$subject = filter_input(INPUT_POST, 'qSubject', FILTER_SANITIZE_STRING);
$info = filter_input(INPUT_POST, 'qInfo', FILTER_SANITIZE_STRING);

$return = "";

if (!isset($name) || empty($name)) {
	$return = "Name not set";
} elseif (!isset($email) || empty($email)) {
	$return = "Email not set";
} elseif (!isset($country) || empty($country)) {
	$return = "Home country not set";
} elseif (!isset($education) || empty($education)) {
	$return = "Level of education not set";
} elseif (!isset($university) || empty($university)) {
	$return = "University not set";
} elseif (!isset($study) || empty($study)) {
	$return = "Level of study not set";
} elseif (!isset($subject) || empty($subject)) {
	$return = "Subject of interest not set";
} else {
	// form is good, let's send it
	$to = 'khan.helen@gmail.com';
	$eSubject = 'Alberta Rose Web Questionnaire';
	$message = "Web Questionnaire Completed:\n"
			  . "\n"
			  . "Name: $name\n"
			  . "Email: $email\n"
			  . "Country: $country\n"
			  . "GPA: $education\n"
			  . "School: $university\n"
			  . "Subject: $subject\n"
			  . "Additional Info: $info\n";

	$headers = "From: $to\n";
	$headers .= "Reply-To: $name <$email>\n";
	$headers .= 'X-Mailer: PHP/' . phpversion() . "\n";
	$headers .= "MIME-Version: 1.0\n";
	$headers .= "Content-type: text/plain; charset=utf-8\n";

	$mr = mail($to, $eSubject, $message, $headers);
	if ($mr) {
		$return = 'Email successfully sent.  We will contact you soon.';
	} else {
		$return = 'Failure sending email.  Please try again later.';
	}
}

$fh = fopen('debug.txt', 'a');
fwrite($fh, $return . "\n");
fclose($fh);

echo $return;
