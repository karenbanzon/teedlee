<html>
    <body>
        <table style="background: #f4f4f4; color: #444444; font-family: Helvetica, Arial, sans-serif" cellspacing="0" cellpadding="0" border="0" width="100%">
            <tbody>
                <tr>
                    <td align="center" valign="top" width="100%" style="background: #f4f4f4">
                        <table cellpadding="0" cellspacing="0" width="640px" style="padding: 20px;">
                            <tr>
                                <td>
                                    <table width="100%" cellpadding="0" cellspacing="0" style="background: #ffffff">
                                        <tr>
                                            <td align="center" style="padding: 10px; border-bottom: 1px solid #e7e7e7">
                                                <a href="{{ url('') }}" target="_blank"><img src="http://teedlee.ph/images/logo.png" alt="Teedlee" style="width: 150px"></a>
                                            </td>
                                        </tr>
                                        
                                        @yield('content')
                                        
                                        <tr>
                                            <td style="padding: 20px 40px;">
                                                <br>
                                                <br>
                                                <p>Thanks,<br><strong>Teedlee Team</strong></p>
                                                <br>
                                                <br>
                                                <hr style="border: none; height: 1px; background: #e7e7e7">
                                                <p style="text-align: center">Got questions? Email us at <a href="mailto:customer@teedlee.ph" target="_blank" style="text-decoration: none; color: #444444; font-weight: bold">customer@teedlee.ph</a>.</p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="padding: 20px">
                                    <small style="color: #aaaaaa">This email was sent by <a href="{{ url('') }}" target="_blank" style="text-decoration: none; color: #444444; font-weight: bold">Teedlee</a>.</small>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>