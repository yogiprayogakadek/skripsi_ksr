<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Tax Invoice</title>
    <link rel="shortcut icon" type="image/png" href="./favicon.png" />
    <style>
        * {
            box-sizing: border-box;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #ddd;
            padding: 10px;
            word-break: break-all;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 16px;
        }

        .h4-14 h4 {
            font-size: 12px;
            margin-top: 0;
            margin-bottom: 5px;
        }

        .img {
            margin-left: "auto";
            margin-top: "auto";
            height: 30px;
        }

        pre,
        p {
            /* width: 99%; */
            /* overflow: auto; */
            /* bpicklist: 1px solid #aaa; */
            padding: 0;
            margin: 0;
        }

        table {
            font-family: arial, sans-serif;
            width: 100%;
            border-collapse: collapse;
            padding: 1px;
        }

        .hm-p p {
            text-align: left;
            padding: 1px;
            padding: 5px 4px;
        }

        td,
        th {
            text-align: left;
            padding: 8px 6px;
        }

        .table-b td,
        .table-b th {
            border: 1px solid #ddd;
        }

        th {
            /* background-color: #ddd; */
        }

        .hm-p td,
        .hm-p th {
            padding: 3px 0px;
        }

        .cropped {
            float: right;
            margin-bottom: 20px;
            height: 100px;
            /* height of container */
            overflow: hidden;
        }

        .cropped img {
            width: 400px;
            margin: 8px 0px 0px 80px;
        }

        .main-pd-wrapper {
            box-shadow: 0 0 10px #ddd;
            background-color: #fff;
            border-radius: 10px;
            padding: 15px;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #ddd;
            padding: 10px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <section class="main-pd-wrapper" style="width: 1000px;">
        <div>
        {{-- <div style="display: table-header-group"> --}}
            <h4 style="text-align: center; margin: 0">
                <b>Medicines Outgoing Report</b>
            </h4>

            <table style="width: 100%; table-layout: fixed">
                <tr>
                    <td style="border-left: 1px solid #ddd; border-right: 1px solid #ddd">
                        <div
                            style="
                  text-align: center;
                  margin: auto;
                  line-height: 1.5;
                  font-size: 14px;
                  color: #4a4a4a;
                ">
                            {{-- <img src="{{ asset('assets/images/logo.png') }}" width="150px"> --}}

                            <p style="font-weight: bold; margin-top: 15px">
                                ITB STIKOM BALI - KSR
                            </p>
                            {{-- <p style="font-weight: bold">
                                Toll Free No. :
                                <a href="tel:018001236477" style="color: #00bb07">1800-123-6477</a>
                            </p> --}}
                        </div>
                    </td>
                    <td align="right"
                        style="
                text-align: right;
                padding-left: 50px;
                line-height: 1.5;
                color: #323232;
              ">
                        <div>
                            <h4 style="margin-top: 5px; margin-bottom: 5px">
                                Report generate to list all outgoing medicines
                            </h4>
                            <p>The "Generate Report: Outgoing Medicines" report is a comprehensive document that provides a detailed overview of all medicines dispensed or distributed during a specified time period. This report serves as a critical tool for healthcare administrators, pharmacists, and medical professionals to monitor medication usage</p>
                            {{-- <p style="font-size: 14px">
                                Aakriti Rathore,B-268, west vinod nagar, street no.2,near
                                press apartment bus stand, Patparganj, IP
                                Extension,Delhi,07,110092,Delhi(07)<br />
                                Tel:
                                <a href="tel:01241234568" style="color: #00bb07">0124-1234568</a>
                            </p> --}}
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <table class="table table-bordered h4-14" style="width: 100%; -fs-table-paginate: paginate; margin-top: 15px">
            <thead>
            {{-- <thead style="display: table-header-group"> --}}
                <tr
                    style="
              margin: 0;
              background: #fcbd021f;
              padding: 15px;
              padding-left: 20px;
              -webkit-print-color-adjust: exact;
            ">
                    <td colspan="4">
                        <h3>
                            E-Reporting for Medicines Outgoing
                            <p
                                style="
                    font-weight: 300;
                    font-size: 85%;
                    color: #626262;
                    margin-top: 7px;
                  ">
                                E-Report Code:
                                <span style="color: #00bb07">Code 123</span><br />
                            </p>
                        </h3>
                    </td>
                    <td colspan="5">
                        <p>Print Date:- {{now()}}</p>
                        <p style="margin: 5px 0">Filter Date:- {{date_format(date_create(now()), 'Y-m-d')}} until {{date_format(date_create(now()), 'Y-m-d')}}</p>
                    </td>
                    <td colspan="4" style="width: 300px">
                        <h4 style="margin: 0">Print By:</h4>
                        <p>
                            {{auth()->user()->name}},<br />
                            {{ucfirst(auth()->user()->role)}} - {{auth()->user()->phone}}
                        </p>
                    </td>
                </tr>

                <tr>
                    <th style="width: 50px">#</th>
                    <th style="width: 150px">
                        <h4>Medicine Name</h4>
                    </th>
                    <th style="width: 80px">
                        <h4>
                            Medicine<br />
                            Code
                        </h4>
                    </th>
                    <th style="width: 80px">
                        <h4>
                            Category
                        </h4>
                    </th>
                    <th style="width: 60px">
                        <h4>Batch<br />
                            Number
                        </h4>
                    </th>
                    <th style="width: 80px">
                        <h4>Stock</h4>
                    </th>

                    <th style="width: 80px">
                        <h4>
                            Expired<br />
                            Date
                        </h4>
                    </th>
                    <th style="width: 80px">
                        <h4>
                            Quantity
                        </h4>
                    </th>
                    <th style="width: 80px">
                        <h4>
                            Unit
                        </h4>
                    </th>
                    <th style="width: 80px" colspan="2">
                        <h4>
                            Description
                        </h4>
                    </th>
                    {{-- <th style="width: 120px">
                        <h4>TOTAL Value</h4>
                    </th> --}}
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01</td>
                    <td>Milkfood Ghee Tp 980Ml</td>
                    <td>40590200</td>
                    <td>100</td>
                    <td>1</td>
                    <td>550.00</td>
                    <td>409.82</td>
                    <td>409.82</td>
                    <td>12.00</td>
                    <td>24.59</td>
                    {{-- <td>459.00</td> --}}
                </tr>
            </tbody>
            {{-- <tfoot></tfoot> --}}
        </table>

        <table class="hm-p table-bordered" style="width: 100%; margin-top: 30px">
            <tr>
                <th style="width: 400px">
                    Medicines Outgoing Total
                </th>
                <td style="vertical-align: top; color: #000">
                    <b>97</b>
                </td>
            </tr>
            <tr>
                <th style="width: 400px">
                    Medicines Total Stock
                </th>
                <td style="vertical-align: top; color: #000">
                    <b>97</b>
                </td>
            </tr>
            {{-- <tr>
                <th style="vertical-align: top">Coupon Discount</th>
                <td style="vertical-align: top; color: #000">
                    <b> ₹0223Test</b>
                </td>
            </tr>
            <tr>
                <th style="vertical-align: top">Delivery Charge</th>
                <td style="vertical-align: top">
                    <b>₹0223Test</b>
                </td>
            </tr>

            <tr>
                <th style="vertical-align: top">Saving</th>
                <td style="vertical-align: top; color: #000">
                    <b>₹0223Test</b>
                </td>
            </tr> --}}
        </table>

        {{-- <table class="hm-p table-bordered" style="width: 100%; margin-top: 30px">
            <tr>
                <th style="width: 400px">
                    <p>Payment Mode:</p>
                    <p>COD:</p>
                    <p>Deerika Cashback:</p>
                </th>
                <td style="width: 100px; border-right: none">
                    <p>&nbsp;</p>
                    <p style="text-align: right"><b>1199</b></p>
                    <p style="text-align: right"><b>90</b></p>
                </td>
                <td colspan="5" style="border-left: none"></td>
            </tr>
            <tr style="background: #fcbd02">
                <th>Total Order Value</th>
                <td style="width: 70px; text-align: right; border-right: none">
                    <b>1289</b>
                </td>
                <td colspan="5" style="border-left: none"></td>
            </tr>
        </table> --}}

        {{-- <table style="width: 100%" cellspacing="0" cellspadding="0" border="0">
            <tr>
                <td>
                    <h4 style="margin: 10px 0">
                        Whether tax is Payable under reverse charge - No
                    </h4>
                    <p>
                        This is computer generated invoice and hence signature is not
                        required
                    </p>
                </td>
                <td>
                    <h4 style="margin: 0; text-align: right">
                        Not a Deerika Plus+ member yet?<br />
                        You could have saved 5%
                    </h4>
                </td>
            </tr>
        </table> --}}
    </section>
</body>

</html>