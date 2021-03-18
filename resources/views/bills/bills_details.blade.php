@extends('layouts.master')
@section('title')
تفاصيل الفاتوره
@stop
@section('css')
<!---Internal  Prism css-->
<link href="{{URL::asset('assets/plugins/prism/prism.css')}}" rel="stylesheet">
<!---Internal Input tags css-->
<link href="{{URL::asset('assets/plugins/inputtags/inputtags.css')}}" rel="stylesheet">
<!--- Custom-scroll -->
<link href="{{URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">قائمه الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تفاصيل الفاتوره</span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
 @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


   @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif



    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif 
				
									



				<!-- row -->
				
                <div class="row row-sm">
					<div class="col-lg-12 col-md-12">
						<div class="card" id="basic-alert">
							<div class="card-body">
								
								<div class="text-wrap">
									<div class="example">
										<div class="panel panel-primary tabs-style-1">
											<div class=" tab-menu-heading">
												<div class="tabs-menu1">
													<!-- Tabs -->
													<ul class="nav panel-tabs main-nav-line">
														<li class="nav-item"><a href="#tab1" class="nav-link active" data-toggle="tab">معلومات الفاتوره</a></li>
														<li class="nav-item"><a href="#tab2" class="nav-link" data-toggle="tab">حالات الدفع</a></li>
														<li class="nav-item"><a href="#tab3" class="nav-link" data-toggle="tab">المرفقات</a></li>
													</ul>
												</div>
											</div>
											<div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
												<div class="tab-content">
													<div class="tab-pane active" id="tab1">
                                                       <div class="table-responsive mt-15">

                                                         <table class="table table-striped" style="text-align:center">
                                                             <tbody>
                                                                <tr>
                                                                  <th scope="row">رقم الفاتورة</th>
                                                                  <td>{{ $bills->bills_number }}</td>
                                                                  <th scope="row">تاريخ الاصدار</th>
                                                                  <td>{{ $bills->bills_Date }}</td>
                                                                  <th scope="row">تاريخ الاستحقاق</th>
                                                                  <td>{{ $bills->Due_date }}</td>
                                                                  <th scope="row">القسم</th>
                                                                  <td>{{ $bills->section->section_name }}</td>
                                                                </tr>
                                                                <tr>
                                                                   <th scope="row">المنتج</th>
                                                                   <td>{{ $bills->product }}</td>
                                                                   <th scope="row">مبلغ التحصيل</th>
                                                                   <td>{{ $bills->Amount_collection }}</td>
                                                                   <th scope="row">مبلغ العمولة</th>
                                                                   <td>{{ $bills->Amount_Commission }}</td>
                                                                   <th scope="row">الخصم</th>
                                                                   <td>{{ $bills->Discount }}</td>
                                                                 </tr>


                                                                  <tr>
                                                                    <th scope="row">نسبة الضريبة</th>
                                                                    <td>{{ $bills->Rate_VAT }}</td>
                                                                    <th scope="row">قيمة الضريبة</th>
                                                                    <td>{{ $bills->Value_VAT }}</td>
                                                                    <th scope="row">الاجمالي مع الضريبة</th>
                                                                    <td>{{ $bills->Total }}</td>
                                                                    <th scope="row">الحالة الحالية</th>

                                                                    @if ($bills->Value_Status == 1)
                                                                        <td>
                                                                            
                                                                         <span class="badge badge-pill badge-success">{{ $bills->Status }}</span>
                                                                        </td>
                                                                    @elseif($bills->Value_Status ==2)
                                                                        <td><span
                                                                                                                                        class="badge badge-pill badge-danger">{{ $bills->Status }}</span>
                                                                        </td>
                                                                    @else
                                                                        <td><span
                                                                                                                                        class="badge badge-pill badge-warning">{{ $bills->Status }}</span>
                                                                        </td>
                                                                    @endif
                                                                 </tr>


                                                                  <tr>
                                                                    <th scope="row">ملاحظات</th>
                                                                    <td>{{ $bills->note }} </td>
                                                                  </tr>   
     

        
                                                             </tbody>
                                                         </table>

                                                       </div>
													</div>
												<div class="tab-pane" id="tab2">
                                                    <div class="table-responsive mt-15">
                                                     <table class="table center-aligned-table mb-0 table-hover" style="text-align:center">
                                                      <thead>
                                                        <tr class="text-dark">
                                                            <th>#</th>
                                                            <th>رقم الفاتورة</th>
                                                            <th>نوع المنتج</th>
                                                            <th>القسم</th>
                                                            <th>حالة الدفع</th>
                                                            <th>تاريخ الدفع </th>
                                                            <th>ملاحظات</th>
                                                            <th>تاريخ الاضافة </th>
                                                            <th>المستخدم</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                        <?php $count = 1; ?>
                                                        @foreach ($details as $detail)
                                                            
                                                            <tr>
                                                                <td>{{ $count++ }}</td>
                                                                <td>{{ $detail->bills_number }}</td>
                                                                <td>{{ $detail->product }}</td>
                                                                <td>{{ $bills->section->section_name }}</td>
                                                                @if ($detail->Value_Status == 1)
                                                                    <td><span
                                                                            class="badge badge-pill badge-success">{{ $detail->status }}</span>
                                                                    </td>
                                                                @elseif($detail->Value_Status ==2)
                                                                    <td><span
                                                                            class="badge badge-pill badge-danger">{{ $detail->status }}</span>
                                                                    </td>
                                                                @else
                                                                    <td><span
                                                                            class="badge badge-pill badge-warning">{{ $detail->status }}</span>
                                                                    </td>
                                                                @endif
                                                                <td>{{ $detail->Payment_Date }}</td>
                                                                <td>{{ $detail->note }}</td>
                                                                <td>{{ $detail->created_at }}</td>
                                                                <td>{{ $detail->user }}</td>
                                                            </tr>
                                                        @endforeach
                                                      </tbody>
                                                     </table>


                                                    </div>
												</div>
													<div class="tab-pane" id="tab3">
                                                    <div class="card card-statistics">
                                                    
                                                        <div class="card-body">
                                                            <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                                                            <h5 class="card-title">اضافة مرفقات</h5>
                                                         <form method="post" action="{{ url('/BillsAttachments') }}"
                                                            enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="customFile"
                                                                    name="file_name" required>
                                                                <input type="hidden" id="customFile" name="bills_number"
                                                                    value="{{ $bills->bills_number }}">
                                                                <input type="hidden" id="bills_id" name="bills_id"
                                                                    value="{{ $bills->id }}">
                                                                <label class="custom-file-label" for="customFile">حدد
                                                                    المرفق</label>
                                                            </div><br><br>
                                                            <button type="submit" class="btn btn-primary btn-sm "
                                                                name="uploadedFile">تاكيد</button>
                                                         </form>
                                                        </div>
                                                         
                                                <br>

                                                <div class="table-responsive mt-15">
                                                    <table class="table center-aligned-table mb-0 table table-hover"
                                                        style="text-align:center">
                                                        <thead>
                                                            <tr class="text-dark">
                                                                <th scope="col">م</th>
                                                                <th scope="col">اسم الملف</th>
                                                                <th scope="col">قام بالاضافة</th>
                                                                <th scope="col">تاريخ الاضافة</th>
                                                                <th scope="col">العمليات</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 1; ?>
                                                            @foreach ($attachments as $attachment)
                                                                
                                                                <tr>
                                                                    <td>{{ $i++ }}</td>
                                                                    <td>{{ $attachment->file_name }}</td>
                                                                    <td>{{ $attachment->Created_by }}</td>
                                                                    <td>{{ $attachment->created_at }}</td>
                                                                    <td colspan="2">

                                                                        <a class="btn btn-outline-success btn-sm"
                                                                            href="{{ url('View_file') }}/{{ $bills->bills_number }}/{{ $attachment->file_name }}"
                                                                            role="button"><i class="fas fa-eye"></i>&nbsp;
                                                                            عرض</a>

                                                                        <a class="btn btn-outline-info btn-sm"
                                                                            href="{{ url('download') }}/{{ $bills->bills_number }}/{{ $attachment->file_name }}"
                                                                            role="button"><i
                                                                                class="fas fa-download"></i>&nbsp;
                                                                            تحميل</a>

                                                                        
                                                                            <button class="btn btn-outline-danger btn-sm"
                                                                                data-toggle="modal"
                                                                                data-file_name="{{ $attachment->file_name }}"
                                                                                data-bills_number="{{ $attachment->bills_number }}"
                                                                                data-id_file="{{ $attachment->id }}"
                                                                                data-target="#delete_file">حذف</button>
                                                                        

                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>

													</div>
												</div>
											</div>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>                
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->

            <!-- delete -->
            <div class="modal fade" id="delete_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">حذف المرفق</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('delete_file') }}" method="post"> 
                     

                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p class="text-center">
                        <h6 style="color:red"> هل انت متاكد من عملية حذف المرفق ؟</h6>
                        </p>

                        <input type="hidden" name="id_file" id="id_file" value="">
                        <input type="hidden" name="file_name" id="file_name" value="">
                        <input type="hidden" name="invoice_number" id="bills_number" value="">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
		</div>
		<!-- main-content closed -->
@endsection

@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Jquery.mCustomScrollbar js-->
<script src="{{URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- Internal Input tags js-->
<script src="{{URL::asset('assets/plugins/inputtags/inputtags.js')}}"></script>
<!--- Tabs JS-->
<script src="{{URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js')}}"></script>
<script src="{{URL::asset('assets/js/tabs.js')}}"></script>
<!--Internal  Clipboard js-->
<script src="{{URL::asset('assets/plugins/clipboard/clipboard.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/clipboard/clipboard.js')}}"></script>
<!-- Internal Prism js-->
<script src="{{URL::asset('assets/plugins/prism/prism.js')}}"></script>


<script>
        $('#delete_file').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_file = button.data('id_file')
            var file_name = button.data('file_name')
            var bills_number = button.data('invoice_number')
            var modal = $(this)
            modal.find('.modal-body #id_file').val(id_file);
            modal.find('.modal-body #file_name').val(file_name);
            modal.find('.modal-body #invoice_number').val(bills_number);
        })
    </script>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection