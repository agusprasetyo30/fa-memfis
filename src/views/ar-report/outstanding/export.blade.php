@php
  use Illuminate\Support\Carbon;
@endphp
@foreach ($customer as $customer_row)
<table cellpadding="3" class="table-head">
  <tr>
    <td><b>Customer Name</b></td>
    <td><b>:</b></td>
    <td><b>{{ $customer_row->name }}</b></td>
  </tr>
</table>
<table cellpadding="4" class="table-body">
  <tr>
    <td><b>Invoice No.</b></td>
    <td><b>Date</b></td>
    <td><b>Due Date</b></td>
    <td><b>Ref No.</b></td>
    <td><b>Currency</b></td>
    <td colspan="2"><b>Rate</b></td>
    <td colspan="2"><b>Total Invoice</b></td>
    {{-- <td colspan="2"><b>VAT</b></td> --}}
    <td colspan="2"><b>Outstanding Balance</b></td>
  </tr>
  @foreach ($customer_row->invoice as $invoice_row)
  <tr>
    <td style="padding-left:8px;">{{ $invoice_row->transactionnumber }}</td>
    <td>{{ Carbon::parse($invoice_row->transactiondate)->format('d F Y') }}</td>
    <td>{{  Carbon::parse($invoice_row->due_date)->format('d F Y') }}</td>
    <td>{{ $invoice_row->quotations->number ?? '-' }}</td>
    <td>{{ $invoice_row->currencies->code }}</td>
    <td>Rp </td>
    <td>{{ number_format($invoice_row->exchangerate, 2, ',', '.') }}</td>
    <td>{{ $invoice_row->currencies->symbol }}</td>
    <td>{{ number_format($invoice_row->grandtotalforeign, 2, ',', '.') }}</td>
    {{-- <td>{{ $invoice_row->currencies->symbol }}</td>
    <td>{{ number_format($invoice_row->ppnvalue, 2, ',', '.') }}</td> --}}
    <td>{{ $invoice_row->currencies->symbol }}</td>
    <td>{{ number_format($invoice_row->ending_balance['amount'], 2, ',', '.') }}</td>
  </tr>
  @endforeach
  @foreach ($customer_row->sum_total as $sum_total_index => $sum_total_row)
  <tr style="border-top:2px solid black;">
    <td colspan="5"></td>
    <td colspan="2"><b>Total {{ strtoupper($sum_total_index) }}</b></td>
    <td class="table-footer"><b>{{ $sum_total_row['symbol'] }}</b></td>
    <td class="table-footer">
      <b>{{ number_format($sum_total_row['grandtotalforeign'], 2, ',', '.') }}</b></td>
    <td class="table-footer"><b>{{ $sum_total_row['symbol'] }}</b></td>
    {{-- <td class="table-footer">
      <b>{{ number_format($sum_total_row['ppnvalue'], 2, ',', '.') }}</b></td>
    <td class="table-footer"><b>{{ $sum_total_row['symbol'] }}</b></td> --}}
    <td class="table-footer">
      <b>{{ number_format($sum_total_row['ending_value'], 2, ',', '.') }}</b></td>
  </tr>
  @endforeach
</table>
@endforeach