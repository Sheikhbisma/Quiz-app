<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin: 0; padding: 0; background-color: #4f46e5; font-family: Arial, sans-serif;">

    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #4f46e5; padding: 40px 20px;">
        <tr>
            <td align="center">
                <table width="100%" max-width="500" border="0" cellspacing="0" cellpadding="0" style="background-color: #ffffff; border-radius: 8px; max-width: 500px; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                    <tr>
                        <td style="padding: 40px; text-align: center;">
                            
                            <div style="margin-bottom: 30px;">
                                <img src="https://cdn-icons-png.flaticon.com/512/6806/6806987.png" alt="Verify" width="120" style="display: block; margin: 0 auto;">
                            </div>

                            <h1 style="color: #1f2937; font-size: 24px; font-weight: bold; margin-bottom: 20px; margin-top: 0;">
                                Verify your email address
                            </h1>

                            <p style="color: #4b5563; font-size: 16px; line-height: 1.6; margin-bottom: 30px;">
                                You've entered <strong style="color: #1f2937;">{{$email}}</strong> as the email address for your account. Please verify this email address by clicking the button below.
                            </p>

                            <table border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto 40px auto;">
                                <tr>
                                    <td align="center" bgcolor="#4f46e5" style="border-radius: 4px;">
                                        <a href="{{$link}}" target="_blank" style="font-size: 16px; font-family: Arial, sans-serif; color: #ffffff; text-decoration: none; padding: 14px 30px; display: inline-block; font-weight: bold;">
                                            Verify your email
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <hr style="border: 0; border-top: 1px solid #e5e7eb; margin-bottom: 20px;">
                            <p style="color: #9ca3af; font-size: 12px; margin-bottom: 8px;">
                                Or copy and paste this link into your browser
                            </p>
                              <p style="color: #21375c; font-size: 12px; margin-bottom: 8px;">
                            {{ $link }}
                        </p>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>
</html>