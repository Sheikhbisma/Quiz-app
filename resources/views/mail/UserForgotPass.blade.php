<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin: 0; padding: 0; background-color: #f9fafb; font-family: Arial, sans-serif;">

    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #f9fafb; padding: 40px 20px;">
        <tr>
            <td align="center">
                <table width="100%" max-width="600" border="0" cellspacing="0" cellpadding="0" style="background-color: #ffffff; border-radius: 8px; max-width: 600px; text-align: left;">
                    <tr>
                        <td style="padding: 40px;">
                            
                            <h1 style="color: #6366f1; font-size: 28px; font-weight: bold; margin-bottom: 25px; margin-top: 0; text-align: center;">
                                Reset your password!
                            </h1>

                            <p style="color: #4b5563; font-size: 15px; line-height: 1.6; margin-bottom: 15px;">
                                You requested to have your password reset for your account with <span style="font-weight: 600;">{{ $shop_name ?? 'Our Shop' }}</span>.
                            </p>
                            
                            <p style="color: #4b5563; font-size: 15px; line-height: 1.6; margin-bottom: 30px;">
                                Please click the link below to reset your password.
                            </p>

                            <table border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto 30px auto;">
                                <tr>
                                    <td align="center" bgcolor="#6366f1" style="border-radius: 6px;">
                                        <a href="{{ $link }}" target="_blank" style="font-size: 16px; font-family: Arial, sans-serif; color: #ffffff; text-decoration: none; padding: 12px 25px; display: inline-block; font-weight: 500;">
                                            Reset password
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <p style="color: #9ca3af; font-size: 13px; text-align: center; margin-top: 40px;">
                                If you received this email in error, you can safely ignore this email.
                            </p>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>
</html>