@extends('layouts.master')
@section('title')
قائمه الفواتير
@stop
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمه الفواتير</span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				
				<div class="row row-sm">
					<!--div-->
					<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0 ml-5" style="width: 150px;">
							<a class="btn btn-outline-primary btn-block" href="bills/create"> + إضافه فاتوره </a>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table key-buttons text-md-nowrap text-center">
										<thead>
											<tr>
												<th class="border-bottom-0">#</th>
												<th class="border-bottom-0">رقم الفاتوره</th>
												<th class="border-bottom-0">تاريخ الفاتوره</th>
												<th class="border-bottom-0">تاريخ الإستحقاق</th>
												<th class="border-bottom-0"> المنتج</th>
												<th class="border-bottom-0">القسم</th>
												<th class="border-bottom-0">الخصم</th>
												<th class="border-bottom-0">نسبه الضريبه</th>
												<th class="border-bottom-0">قيمه الضريبه</th>
												<th class="border-bottom-0">الاإجمالى</th>
												<th class="border-bottom-0">الحاله</th>
												<th class="border-bottom-0">ملاحظات</th>
												<th class="border-bottom-0">العمليات</th>

											</tr>
										</thead>
										<tbody>
											@php $count =1 @endphp
											@foreach($bills as $bill)
											<tr>
												<td>{{ $count++ }}</td>
												<td>{{ $bill->bills_number }}</td>
												<td>{{ $bill->bills_Date }}</td>
												<td>{{ $bill->Due_date }}</td>
												<td>{{ $bill->product }}</td>
												<td>
                                                <a href="{{ url('BillsDetails') }}/{{ $bill->id }}">
												{{ $bill->section->section_name }}
											    </a>
												</td>
												<td>{{ $bill->Discount }}</td>
												<td>{{ $bill->Rate_VAT }}</td>
												<td>{{ $bill->Value_VAT }}</td>
												<td>{{ $bill->Total }}</td>
												<td>
													@if ($bill->Value_Status == 1)
                                                    <span class="text-success">{{ $bill->Status }}</span>
                                                    @elseif($bill->Value_Status == 2)
                                                    <span class="text-danger">{{ $bill->Status }}</span>
                                                    @else
                                                    <span class="text-warning">{{ $bill->Status }}</span>
                                                    @endif
										        </td>
												<td>{{ $bill->note }}</td>
												<td>
												<div class="dropdown">
	                                               <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-info"
	                                               data-toggle="dropdown" type="button">العمليات<i class="fas fa-caret-down ml-1"></i></button>
	                                               <div class="dropdown-menu tx-13">
		                                              
		                                               <a class="dropdown-item" href="{{ url('edit_bills') }}/{{ $bill->id }}">تعديل الفاتوره</a> 
													   <a class="dropdown-item" href="#">Another action</a>
		                                               
		                                           
	                                               </div>
                                                </div>

												

												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!--/div-->				
				</div>
				
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection