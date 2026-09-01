@extends('layout.usermasterlayout')

@section('content')
<div class="no-print flex justify-center gap-4 py-6" style="background-color: var(--bg-cream);">
    <a href="{{route('dcertificate',['id'=>$id])}}" 
       class="inline-flex items-center gap-2 px-6 py-2 bg-stone-900 text-white rounded-lg font-bold text-[11px] uppercase tracking-widest hover:opacity-90 transition-all shadow-md">
        <i class="bi bi-download"></i> Download PDF
    </a>
   
</div>

<div class="flex items-center justify-center pb-20 px-4" style="background-color: var(--bg-cream);">
    
    <div id="certificate-ui" 
         style="background: white; 
                max-width: 850px; 
                width: 100%; 
                aspect-ratio: 1.414 / 1; 
                position: relative; 
                box-shadow: 0 20px 40px rgba(0,0,0,0.1);
                border: 1px solid #e2e8f0;
                overflow: hidden;">
        
        <div style="padding: 30px; height: 100%;">
            <div style="border: 6px double var(--primary-dark); height: 100%; padding: 40px; position: relative; display: flex; flex-direction: column; justify-content: space-between;">
                
                <div style="position: absolute; top: 0; left: 0; width: 40px; height: 40px; border-top: 4px solid #b45309; border-left: 4px solid #b45309;"></div>
                <div style="position: absolute; top: 0; right: 0; width: 40px; height: 40px; border-top: 4px solid #b45309; border-right: 4px solid #b45309;"></div>
                <div style="position: absolute; bottom: 0; left: 0; width: 40px; height: 40px; border-bottom: 4px solid #b45309; border-left: 4px solid #b45309;"></div>
                <div style="position: absolute; bottom: 0; right: 0; width: 40px; height: 40px; border-bottom: 4px solid #b45309; border-right: 4px solid #b45309;"></div>

                <div style="text-align: center;">
                    <i class="bi bi-award" style="font-size: 40px; color: #b45309; margin-bottom: 10px; display: block;"></i>
                    <h1 style="font-family: 'serif'; font-size: 45px; margin: 0; text-transform: uppercase; letter-spacing: 5px; color: #0f172a;">Certificate</h1>
                    <p style="text-transform: uppercase; letter-spacing: 3px; color: #b45309; font-weight: bold; font-size: 12px; margin-top: 5px;">Honorary Achievement</p>
                </div>

                <div style="text-align: center; margin: 20px 0;">
                    <p style="font-style: italic; font-size: 16px; color: #64748b; margin-bottom: 10px;">This is to certify that</p>
                    <h2 style="font-family: 'serif'; font-size: 38px; color: #1e293b; margin: 0; padding-bottom: 5px; border-bottom: 1px solid #e2e8f0; display: inline-block;">
                        {{$data['username']}}
                    </h2>
                    <p style="font-size: 16px; color: #475569; margin-top: 20px; line-height: 1.5;">
                        Has successfully completed the professional assessment for <br>
                        <strong style="color: #0f172a; text-transform: uppercase; font-size: 18px;">"{{$data['quizName']}}"</strong><br>
                        achieving a score of <span style="color: #15803d; font-weight: bold;">{{$data['percentage']}}%</span>
                    </p>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: flex-end; padding: 0 20px;">
                    <div style="width: 150px; text-align: center;">
                        <div style="border-bottom: 1px solid #0f172a; font-size: 14px; font-weight: bold; padding-bottom: 5px;">{{$data['date']}}</div>
                        <p style="font-size: 9px; text-transform: uppercase; color: #94a3b8; margin-top: 5px;">Date Issued</p>
                    </div>

                    <div style="position: relative;">
                        <div style="background: #fbbf24; width: 70px; height: 70px; border-radius: 50%; border: 3px double #b45309; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 15px rgba(180, 83, 9, 0.2);">
                            <i class="bi bi-patch-check-fill" style="font-size: 30px; color: #b45309;"></i>
                        </div>
                    </div>

                    <div style="width: 150px; text-align: center;">
                        <div style="border-bottom: 1px solid #0f172a; font-family: 'cursive'; font-size: 18px; padding-bottom: 5px;">Verified Online</div>
                        <p style="font-size: 9px; text-transform: uppercase; color: #94a3b8; margin-top: 5px;">Official Signature</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    @media print {
        .no-print { display: none !important; }
        body { background: white !important; margin: 0; padding: 0; }
        .flex { display: block !important; }
        #certificate-ui { 
            box-shadow: none !important; 
            border: none !important; 
            margin: 0 auto !important;
            width: 100% !important;
            max-width: 100% !important;
        }
    }
</style>
@endsection