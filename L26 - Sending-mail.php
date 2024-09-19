<?php
// mail(to, subject, message, headers, parameters);
// mail() function is used to send an email. It requires at least three parameters: to, subject, and message.

// Example 1
if (mail('demo@gmail.com', 'Test email', 'This is a test email', 'From: admin@mynexusbpo.com')) {
    echo 'Email sent successfully';
} else {
    echo 'Email sending failed';
}
