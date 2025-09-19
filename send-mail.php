<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $requirement = htmlspecialchars($_POST['requirement']);

    $to = "thesofadiseno@gmail.com";
    $subject = "New Enquiry from $name";
    $message = "
    <html>
    <body>
        <h2>New Enquiry Details</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Requirement:</strong><br>$requirement</p>
    </body>
    </html>";

    // ✅ Safer headers
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8\r\n";
    $headers .= "From: Sofa Diseno <no-reply@sofadiseno.com>\r\n"; // Use domain email
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('✅ Your message has been sent successfully!'); window.location.href='thank-you.html';</script>";
    } else {
        echo "<script>alert('❌ Sorry, there was a problem sending your message. Please try again.'); window.history.back();</script>";
    }
}
?>
