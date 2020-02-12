<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @page {
            margin: 0cm 0cm;
        }

        html,body{
            padding: 0;
            margin: 0;
            font-size: 12px;
        }

        body{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin-top: 4.1cm;
            margin-bottom: 2cm;
        }


        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 1.8cm;
        }
        ul li{
            display: inline-block;
        }

        table{
            border-collapse: collapse;
        }

        #head{
            top:20px;
            left: 510px;
            position: absolute;
        }

        .container{
            width: 100%;
            margin: 0 36px;
        }

        .barcode{
            margin-left:70px;
            margin-top:12px;
        }

        #content{
            width:100%;
            margin-bottom:20px;
        }

        #content2 .body{
            width: 100%;
            border-left:  2px solid  #e6eef2;
            border-right:  2px solid  #e6eef2;
            border-bottom:  2px solid  #e6eef2;
        }

        .page_break {
            page-break-before: always;
        }
    </style>
</head>
<body>
    <header>
        <img src="./vendor/courier/img/form/trial-balance/Header.png" alt=""width="100%">
        <div id="head">
            <div style="margin-right:20px;text-align:center;">
                <h1 style="font-size:24px;">Bank Payment Journal<br><span style="font-size:18px;">(Cashbook)</span></h1>
            </div>
        </div>
    </header>

    <footer>
        <div class="container">
            <table width="100%">
                <tr>
                    <td>  <span style="margin-left:6px;">Created By : Name ; Timestamp  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;Approved By : Name ; Timestamp &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; Printed By :  Name ; Timestamp </span> </td>
                </tr>
            </table>
        </div>
        <img src="./vendor/courier/img/form/trial-balance/Footer.png" width="100%" alt="" >
    </footer>

    <div id="content">
        <div class="container">
            <table width="100%" cellpadding="4">
                <tr>
                    <td valign="top" width="18%">Transaction No.</td>
                    <td valign="top" width="1%">:</td>
                    <td valign="top" width="31%">{{$cashbook->transactionnumber}}</td>
                    <td valign="top" width="18%">
											@if ($type == 'rj')
												Receive From
											@else
												Payment To
											@endif
										</td>
                    <td valign="top" width="1%">:</td>
                    <td valign="top" width="31%">{{$cashbook->personal}}</td>
                </tr>
                <tr>
                    <td valign="top" width="18%">Date</td>
                    <td valign="top" width="1%">:</td>
                    <td valign="top" width="31%">{{$cashbook->transactiondate}}</td>
                    <td valign="top" width="18%">Currency</td>
                    <td valign="top" width="1%">:</td>
                    <td valign="top" width="31%">{{$cashbook->currency}}</td>
                </tr>
                <tr>
                    <td valign="top" width="18%">Ref No.</td>
                    <td valign="top" width="1%">:</td>
                    <td valign="top" width="31%">{{$cashbook->refno}}</td>
                    <td valign="top" width="18%">Exchange Rate</td>
                    <td valign="top" width="1%">:</td>
                    <td valign="top" width="31%">{{number_format($cashbook->exchangerate, 0, 0, '.')}}</td>
                </tr>
            </table>
        </div>
    </div>

    <div id="content2">
        <div class="container">
            <div class="body">
                <table width="100%" cellpadding="4" page-break-inside: auto;>
                    <thead>
                        <tr style="background:#e6eef2;">
                            <td width="15%" align="center">Account Code</td>
                            <td width="20%" align="center">Account Name</td>
                            <td width="31%" align="center">Description</td>
                            <td width="17%" align="center">Debit</td>
                            <td width="17%" align="center">Credit</td>
                        </tr>
                    </thead>
                    <tbody>
                        @for($a = 0 ; $a<count($detail); $a++)
													@php
														$arr = $detail[$a];
													@endphp
                            <tr>
                                <td width="15%" align="center">{{$arr->coa_detail}}</td>
                                <td width="20%" align="center">{{$arr->coa_name}}</td>
                                <td width="31%" align="center">{{$arr->_desc}}</td>
                                <td width="17%" align="center">
																	@if ($arr->debit > 0)
																		{{$arr->symbol.' '.number_format($arr->debit, 0, 0, '')}}
																	@endif
																</td>
                                <td width="17%" align="center">
																	@if ($arr->credit > 0)
																		{{$arr->symbol.' '.number_format($arr->credit, 0, 0, '')}}
																	@endif
																</td>
                            </tr>
                        @endfor
                    </tbody>
                    <tr style="background:#d3e9f5;">
                        <td colspan="3"><i>Terbilang total amount</i></td>
                        <td colspan="2" style="background:#e6eef2"><b>Total : {{$detail[0]->symbol}}. {{number_format($total, 0, 0, '')}}</b></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div id="content3">
        <div class="container">
            <table width="100%" border="1">
                <tr>
                    <td align="center" valign="top" height="60" weight="25%">Accountancy</td>
                    <td align="center" valign="top" height="60" weight="25%">Acknowledge By</td>
                    <td align="center" valign="top" height="60" weight="25%">Approved By</td>
                    <td align="center" valign="top" height="60" weight="25%">Cashier</td>
                </tr>
            </table>
            <div style="text-align: right; margin-top:12px; font-size:18px;">
                Received By
            </div>
        </div>
    </div>
</body>
</html>
