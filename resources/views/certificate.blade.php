@extends('layout.usermasterlayout')
@section('title', 'Certificate | QuizSite')

@section('content')
<div class="no-print flex justify-center gap-4 py-6">
    <a href="{{ route('dcertificate',['id'=>$id]) }}"
       class="btn-standard !py-2.5 text-[11px] uppercase tracking-widest">
        <i class="bi bi-download"></i> Download PDF
    </a>
</div>

<div class="flex items-center justify-center px-4 pb-20" style="background-color: var(--bg-cream);">

    <div id="certificate-ui"
         style="background: white; max-width: 850px; width: 100%; aspect-ratio: 1.414 / 1; position: relative;
                box-shadow: 0 20px 40px rgba(0,0,0,0.12); border: 1px solid #e2e8f0; overflow: hidden;">

        <div style="padding: 30px; height: 100%;">
            <div style="border: 2px solid #f59e0b; height: 100%; padding: 36px; position: relative; display: flex; flex-direction: column; justify-content: space-between;
                        border-radius: 8px;">
                <div style="position: absolute; top: 14px; left: 14px; width: 90px; height: 90px; border-top: 3px solid #f59e0b30; border-left: 3px solid #f59e0b30; border-radius:0 0 0 0;"></div>
                <div style="position: absolute; top: 14px; right: 14px; width: 90px; height: 90px; border-top: 3px solid #f59e0b30; border-right: 3px solid #f59e0b30;"></div>
                <div style="position: absolute; bottom: 14px; left: 14px; width: 90px; height: 90px; border-bottom: 3px solid #f59e0b30; border-left: 3px solid #f59e0b30;"></div>
                <div style="position: absolute; bottom: 14px; right: 14px; width: 90px; height: 90px; border-bottom: 3px solid #f59e0b30; border-right: 3px solid #f59e0b30;"></div>

                <div style="text-align: center;">
                    <div style="margin: 0 auto 8px; width: 56px; height: 56px; border-radius: 50%;
                                background: linear-gradient(120deg, #f59e0b, #fbbf24); display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-award" style="font-size: 26px; color: #fff;"></i>
                    </div>
                    <h1 style="font-family: 'serif'; font-size: 44px; margin: 0; text-transform: uppercase; letter-spacing: 6px; color: #312e81;">Certificate</h1>
                    <p style="text-transform: uppercase; letter-spacing: 3px; color: #b45309; font-weight: bold; font-size: 11px; margin-top: 6px;">Honorary Achievement of Excellence</p>
                </div>

                <div style="text-align: center; margin: 16px 0;">
                    <p style="font-style: italic; font-size: 16px; color: #64748b; margin-bottom: 12px;">This is to proudly certify that</p>
                    <h2 style="font-family: 'serif'; font-size: 36px; color: #1e1b4b; margin: 0; padding-bottom: 6px;
                               border-bottom: 2px solid #f59e0b; display: inline-block;">
                        {{ $data['username'] }}
                    </h2>
                    <p style="font-size: 16px; color: #475569; margin-top: 18px; line-height: 1.6;">
                        Has successfully completed the professional assessment for <br>
                        <strong style="color: #312e81; text-transform: uppercase; font-size: 17px;">"{{ $data['quizName'] }}"</strong><br>
                        achieving a score of <span style="color: #15803d; font-weight: bold; font-size: 18px;">{{ $data['percentage'] }}%</span>
                    </p>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: flex-end; padding: 0 20px;">
                    <div style="width: 150px; text-align: center;">
                        <div style="border-bottom: 2px solid #312e81; font-size: 14px; font-weight: bold; padding-bottom: 5px;">{{ $data['date'] }}</div>
                        <p style="font-size: 9px; text-transform: uppercase; color: #94a3b8; margin-top: 5px;">Date Issued</p>
                    </div>

                    <div style="position: relative;">
                        <div style="background: linear-gradient(120deg, #f59e0b, #fbbf24); width: 68px; height: 68px; border-radius: 50%;
                                    border: 3px solid #fff; outline: 2px solid #b45309; display: flex; align-items: center; justify-content: center;
                                    box-shadow: 0 5px 15px rgba(180, 83, 9, 0.25);">
                            <i class="bi bi-patch-check-fill" style="font-size: 30px; color: #fff;"></i>
                        </div>
                    </div>

                    <div style="width: 150px; text-align: center;">
                        <div style="border-bottom: 2px solid #312e81; font-family: 'cursive'; font-size: 18px; padding-bottom: 5px;">Verified Online</div>
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
            box-shadow: none !important; border: none !important;
            margin: 0 auto !important; width: 100% !important; max-width: 100% !important;
        }
    }
</style>
@endsection