<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        @vite('resources/css/app.css') <!-- Tailwind CSS -->

</head>
<body class="min-h-screen flex flex-col bg-gray-100">
    <div style="background-color: #f1f5f9; min-height: 100vh; padding: 40px 10px; display: flex; align-items: center; justify-content: center; font-family: 'serif';">
    
    <div id="certificate-ui" style="background: white; padding: 8px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); max-width: 800px; width: 100%; border: 12px double #1e293b; position: relative;">
        
        <div style="position: absolute; top: 0; left: 0; width: 60px; height: 60px; border-top: 6px solid #b45309; border-left: 6px solid #b45309;"></div>
        <div style="position: absolute; top: 0; right: 0; width: 60px; height: 60px; border-top: 6px solid #b45309; border-right: 6px solid #b45309;"></div>
        <div style="position: absolute; bottom: 0; left: 0; width: 60px; height: 60px; border-bottom: 6px solid #b45309; border-left: 6px solid #b45309;"></div>
        <div style="position: absolute; bottom: 0; right: 0; width: 60px; height: 60px; border-bottom: 6px solid #b45309; border-right: 6px solid #b45309;"></div>

        <div style="border: 2px solid #f1f5f9; padding: 60px 40px; text-align: center; position: relative; overflow: hidden;">
            
            <div style="position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; opacity: 0.05; pointer-events: none; transform: rotate(-45deg); font-size: 150px; font-weight: bold; color: #000; z-index: 0;">
                PASSED
            </div>

            <div style="position: relative; z-index: 1;">
                <h1 style="font-size: 60px; margin: 0; text-transform: uppercase; letter-spacing: -2px; color: #0f172a;">Certificate</h1>
                <div style="display: flex; align-items: center; justify-content: center; gap: 15px; margin-top: 10px;">
                    <div style="height: 2px; width: 50px; background: #b45309;"></div>
                    <span style="text-transform: uppercase; letter-spacing: 4px; color: #b45309; font-weight: bold;">Of Achievement</span>
                    <div style="height: 2px; width: 50px; background: #b45309;"></div>
                </div>
            </div>

            <div style="margin-top: 40px; position: relative; z-index: 1;">
                <p style="font-style: italic; font-size: 20px; color: #64748b; margin-bottom: 10px;">This is to certify that</p>
                
                <h2 style="font-size: 45px; color: #1e293b; border-bottom: 3px double #cbd5e1; display: inline-block; padding: 0 40px 10px 40px; margin: 10px 0 30px 0;">
                    {{$data['username']}}
                </h2>

                <p style="font-size: 18px; color: #475569; line-height: 1.6; max-width: 500px; margin: 0 auto;">
                    Has successfully completed the assessment for <br>
                    <b style="color: #0f172a; font-size: 22px; text-transform: uppercase;">"{{$data['quizName']}}"</b> <br>
                    with an outstanding score of <span style="color: #15803d; font-weight: bold;">{{$data['percentage']}}%</span>.
                </p>
            </div>

            <div style="margin-top: 60px; display: flex; justify-content: space-between; align-items: center; position: relative; z-index: 1;">
                
                <div style="width: 180px;">
                    <div style="border-bottom: 2px solid #0f172a; padding-bottom: 5px; font-weight: bold; color: #1e293b;">
                       {{$data['date']}}
                    </div>
                    <p style="font-size: 12px; text-transform: uppercase; color: #94a3b8; margin-top: 8px; letter-spacing: 1px;">Date Issued</p>
                </div>

                <div style="position: relative;">
                    <div style="background: #fbbf24; width: 80px; height: 80px; border-radius: 50%; border: 4px solid #b45309; display: flex; align-items: center; justify-content: center; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);">
                        <span style="font-size: 30px;">⭐</span>
                    </div>
                </div>

                <div style="width: 180px;">
                    <div style="border-bottom: 2px solid #0f172a; padding-bottom: 5px; font-family: 'cursive'; font-size: 22px; color: #1e293b;">
                        Official Verified
                    </div>
                    <p style="font-size: 12px; text-transform: uppercase; color: #94a3b8; margin-top: 8px; letter-spacing: 1px;">Authorized By</p>
                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>