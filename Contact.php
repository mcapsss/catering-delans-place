<?php include('partials-front/menu.php'); ?>

<html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 40px;
            }

            form {
                background-color: #ffffff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                max-width: 600px;
                margin: 0 auto;
            }

            label {
                display: block;
                margin-bottom: 8px;
                font-weight: bold;
            }

            input[type="text"], textarea {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            input[type="submit"] {
                background-color: #333;
                color: #fff;
                padding: 10px 15px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color: #555;
            }

            .footer-link {
                margin-top: 20px;
                display: flex;
                justify-content: space-between;
            }
        </style>
        <script type="text/javascript">
            function ValidateForm(frm) {
                if (frm.Name.value == "") {
                    alert('Name is required.');
                    frm.Name.focus();
                    return false;
                }
                if (frm.FromEmailAddress.value == "") {
                    alert('Email address is required.');
                    frm.FromEmailAddress.focus();
                    return false;
                }
                if (frm.FromEmailAddress.value.indexOf("@") < 1 || frm.FromEmailAddress.value.indexOf(".") < 1) {
                    alert('Please enter a valid email address.');
                    frm.FromEmailAddress.focus();
                    return false;
                }
                if (frm.Comments.value == "") {
                    alert('Please enter comments or questions.');
                    frm.Comments.focus();
                    return false;
                }
                return true;
            }
        </script>
    </head>
    <body>
        <form action="//submit.form" id="ContactUs100" method="post" onsubmit="return ValidateForm(this);">
            <table style="width:100%;max-width:550px;border:0;" cellpadding="8" cellspacing="0">
                <tr>
                    <td><label for="Name">Name*:</label></td>
                    <td><input name="Name" type="text" maxlength="60" /></td>
                </tr>
                <tr>
                    <td><label for="PhoneNumber">Phone number:</label></td>
                    <td><input name="PhoneNumber" type="text" maxlength="43" /></td>
                </tr>
                <tr>
                    <td><label for="FromEmailAddress">Email address*:</label></td>
                    <td><input name="FromEmailAddress" type="text" maxlength="90" /></td>
                </tr>
                <tr>
                    <td><label for="Comments">Comments*:</label></td>
                    <td><textarea name="Comments" rows="7" cols="40"></textarea></td>
                </tr>
                <tr>
                    <td>* - required fields</td>
                    <td>
                        <div style="float:right"><a href="https://www.100forms.com" id="lnk100" title="form to email">form to email</a></div>
                        <input name="skip_Submit" type="submit" value="Submit" />
                    </td>
                </tr>
            </table>
            <script src="https://www.100forms.com/js/FORMKEY:D6LJHQ7PYNB5/SEND:my@email.com" type="text/javascript"></script>
        </form>
    </body>
</html>

<?php include('partials-front/footer.php'); ?>
