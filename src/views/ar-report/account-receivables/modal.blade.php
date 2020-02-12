<div class="modal fade" id="modal_account_rh" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleModaladjustment">Account Receivables History</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="AdjustmentForm">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Date Period
                                </label>
                            
                                @component('input::datepicker')
                                    @slot('id', 'daterange_account_receivables_history')
                                    @slot('name', 'daterange_account_receivables_history')
                                    @slot('id_error', 'daterange_account_receivables_history')
                                @endcomponent
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 pl-5">
                                <h2 class="text-primary">Additional Filter</h2>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Department
                                </label>
                            
                                @component('input::select2')
                                    @slot('id', 'department')
                                    @slot('name', 'department')
                                    @slot('id_error', 'department')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Location
                                </label>
                            
                                @component('input::select2')
                                    @slot('id', 'location')
                                    @slot('name', 'location')
                                    @slot('id_error', 'location')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Department
                                </label>
                            
                                @component('input::select2')
                                    @slot('id', 'dep')
                                    @slot('name', 'dep')
                                    @slot('id_error', 'dep')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Currency
                                </label>
                            
                                @component('input::select')
                                    @slot('id', 'currency')
                                    @slot('name', 'currency')
                                    @slot('id_error', 'currency')
                                @endcomponent
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                <div class="flex">
                                    <div class="action-buttons">
                                        @component('buttons::submit')
                                            @slot('id', 'update_adjustment')
                                            @slot('type', 'button')
                                            @slot('color','primary')
                                            @slot('text','view')
                                            @slot('icon','fa-search')
                                        @endcomponent

                                        @include('buttons::close')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@push('footer-scripts')
    <script src="{{ asset('vendor/courier/frontend/functions/daterange/account-receivables-history.js')}}"></script>

    <script src="{{ asset('vendor/courier/frontend/functions/select2/department.js')}}"></script>
    <script src="{{ asset('vendor/courier/frontend/functions/fill-combobox/department.js')}}"></script>

    <script src="{{ asset('vendor/courier/frontend/functions/select2/currency.js')}}"></script>
    <script src="{{ asset('vendor/courier/frontend/functions/fill-combobox/currency.js')}}"></script>

    <script src="{{ asset('vendor/courier/frontend/functions/select2/location.js')}}"></script>
@endpush

    