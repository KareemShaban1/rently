@extends('backend.dashboard.layouts.master')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .select2-container--open .select2-dropdown {
            right: -325px;
        }

        .select2-container .select2-selection--single {
            height: 40px;
        }
    </style>
@endpush
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body pb-0">
                        <!--begin::Heading-->
                        <div class="card-px text-center pt-10 pb-5">
                            <!--begin:Form-->
                            <form id="kt_modal_new_target_form" class="form"
                                action="{{ route('product.update', $product->id) }}" method="POST">
                                @csrf

                                @method('PUT')
                                <!--begin::Heading-->
                                <div class="mb-13 text-center">
                                    <!--begin::Title-->
                                    <h1 class="mb-3">Edit Product</h1>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="text-muted fw-bold fs-5">If you need more info, please check
                                        <a href="#" class="fw-bolder link-primary">Project Guidelines</a>.
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex flex-column mb-8 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Name En</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Specify a target name for future usage and reference"></i>
                                            </label>
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Enter Target Title" name="name_en"
                                                value="{{ $product->name_en }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex flex-column mb-8 fv-row">

                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Name Ar</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Specify a target name for future usage and reference"></i>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Enter Target Title" name="name_ar"
                                                value="{{ $product->name_ar }}" />
                                        </div>
                                    </div>


                                    <div class="col-md-8">
                                        <div class="d-flex flex-column mb-8 fv-row">

                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Manufacturing</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Specify a target name for future usage and reference"></i>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Enter Target Title" name="manfacturing"
                                                value="{{ $product->manfacturing }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex flex-column mb-8 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Bar Code</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Specify a target name for future usage and reference"></i>
                                            </label>
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Enter Bar Code" name="bar_code"
                                                value="{{ $product->bar_code }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex flex-column mb-8 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Code</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Specify a target name for future usage and reference"></i>
                                            </label>
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Enter Bar Code" name="code" value="{{ $product->code }}" />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="d-flex flex-column mb-8 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">International Code</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Specify a target name for future usage and reference"></i>
                                            </label>
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Enter International Code" name="international_code"
                                                value="{{ $product->international_code }}" />
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-10">
                                        <label
                                            class="d-flex form-label fs-6 fw-bold text-label">{{ trans('backend.Effective_Material') }}</label>
                                        <select data-control="select2" data-placeholder="Effective Material"
                                            class="form-select form-select-sm form-select-solid custom-selector"
                                            name="effective_material_id" data-placeholder="Select Effective Material"
                                            data-allow-clear="true" data-kt-user-table-filter="role"
                                            data-hide-search="true">
                                            @foreach ($effectiveMaterials as $material)
                                                <option value="{{ $material->id }}" @selected($material->id == $product->effective_material_id)>
                                                    {{ $material->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>


                                    <div class="col-md-4 mb-10">
                                        <label
                                            class="d-flex form-label fs-6 fw-bold text-label">{{ trans('backend.Distribution_Company') }}</label>
                                        <select data-control="select2" data-placeholder="Distribution Company"
                                            class="form-select form-select-sm form-select-solid custom-selector"
                                            name="distribution_company_id" data-placeholder="Select Distribution Company"
                                            data-allow-clear="true" data-kt-user-table-filter="role"
                                            data-hide-search="true">
                                            @foreach ($distributionCompanies as $distributionCompany)
                                                <option value="{{ $distributionCompany->id }}"
                                                    @selected($distributionCompany->id == $product->distribution_company_id)>
                                                    {{ $distributionCompany->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>


                                    <div class="col-md-4 mb-10">
                                        <label
                                            class="d-flex form-label fs-6 fw-bold text-label">{{ trans('backend.Producing_Company') }}</label>
                                        <select data-control="select2" data-placeholder="Producing Company"
                                            class="form-select form-select-sm form-select-solid custom-selector"
                                            name="producing_company_id" data-placeholder="Select Category"
                                            data-allow-clear="true" data-kt-user-table-filter="role"
                                            data-hide-search="true">
                                            @foreach ($producingCompanies as $producingCompany)
                                                <option value="{{ $producingCompany->id }}" @selected($producingCompany->id == $product->producing_company_id)>
                                                    {{ $producingCompany->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>


                                    <div class="col-md-4 mb-10">
                                        <label
                                            class="d-flex form-label fs-6 fw-bold text-label">{{ trans('backend.Product_Category') }}</label>
                                        <select data-control="select2" data-placeholder="Product Category"
                                            class="form-select form-select-sm form-select-solid custom-selector"
                                            name="product_category_id" data-placeholder="Select Product Category"
                                            data-allow-clear="true" data-kt-user-table-filter="role"
                                            data-hide-search="true">
                                            @foreach ($productCategories as $productCategory)
                                                <option value="{{ $productCategory->id }}" @selected($productCategory->id == $product->product_category_id)>
                                                    {{ $productCategory->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>


                                    <div class="col-md-4 mb-10">
                                        <label
                                            class="d-flex form-label fs-6 fw-bold text-label">{{ trans('backend.Product_Group') }}</label>
                                        <select data-control="select2" data-placeholder="Product Group"
                                            class="form-select form-select-sm form-select-solid custom-selector"
                                            name="product_group_id" data-placeholder="Select Product Group"
                                            data-allow-clear="true" data-kt-user-table-filter="role"
                                            data-hide-search="true">
                                            @foreach ($productGroups as $productGroup)
                                                <option value="{{ $productGroup->id }}" @selected($productGroup->id == $product->product_group_id)>
                                                    {{ $productGroup->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>


                                    <div class="col-md-4 mb-10">
                                        <label
                                            class="d-flex form-label fs-6 fw-bold text-label">{{ trans('backend.product_Type') }}</label>
                                        <select data-control="select2" data-placeholder="Product Type"
                                            class="form-select form-select-sm form-select-solid custom-selector"
                                            name="product_type_id" data-placeholder="Select Product Type"
                                            data-allow-clear="true" data-kt-user-table-filter="role"
                                            data-hide-search="true">
                                            @foreach ($productTypes as $productType)
                                                <option value="{{ $productType->id }}" @selected($productType->id == $product->product_type_id)>
                                                    {{ $productType->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="d-flex flex-column mb-8 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Selling Price</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Specify a target name for future usage and reference"></i>
                                            </label>
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Enter Selling Price" name="selling_price"
                                                value="{{ $product->selling_price }}" />
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="d-flex flex-column mb-8 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Cost Price</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Specify a target name for future usage and reference"></i>
                                            </label>
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Enter Cost Price" name="cost_price"
                                                value="{{ $product->cost_price }}" />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="d-flex flex-column mb-8 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Discount Percentage</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Specify a target name for future usage and reference"></i>
                                            </label>
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Enter Discount Percentage" name="discount_percentage"
                                                value="{{ $product->discount_percentage }}" />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="d-flex flex-column mb-8 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Big Unit</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Specify a target name for future usage and reference"></i>
                                            </label>
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Enter Big Unit" name="big_unit"
                                                value="{{ $product->big_unit }}" />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="d-flex flex-column mb-8 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Intermediate Unit</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Specify a target name for future usage and reference"></i>
                                            </label>
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Enter Intermediate Unit" name="intermediate_unit"
                                                value="{{ $product->intermediate_unit }}" />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="d-flex flex-column mb-8 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Small Unit</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Specify a target name for future usage and reference"></i>
                                            </label>
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Enter Small Unit" name="small_unit"
                                                value="{{ $product->small_unit }}" />
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="d-flex flex-column mb-8 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Maximum Order</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Specify a target name for future usage and reference"></i>
                                            </label>
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Enter Maximum Order" name="maximum_order"
                                                value="{{ $product->maximum_order }}" />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="d-flex flex-column mb-8 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Limit Order</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Specify a target name for future usage and reference"></i>
                                            </label>
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Enter Limit Order" name="limit_order"
                                                value="{{ $product->limit_order }}" />
                                        </div>
                                    </div>


                                </div>


                                <div class="row">

                                    @foreach ($productProperties as $property)
                                        @php
                                            $productPropertiesData = json_decode($product->product_properties, true);
                                        @endphp
                                        <div class="col-md-3">
                                            <div class="d-flex flex-column mb-8 fv-row col-md-6">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">{{ $property->name }}</span>
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-append">
                                                        <label
                                                            class="form-check form-switch form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1"
                                                                name="product_properties[{{ $property->name }}]"
                                                                {{ isset($productPropertiesData[$property->name]) ? 'checked' : '' }}>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>



                                <!--begin::Actions-->
                                <div class="text-center">
                                    <button type="reset" id="kt_modal_new_target_cancel"
                                        class="btn btn-light me-3">Cancel</button>
                                    <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                                        <span class="indicator-label">Submit</span>
                                        <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                                <!--end::Actions-->
                            </form>
                            <!--end:Form-->
                        </div>
                        <!--end::Heading-->

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->

            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            $(document).ready(function() {
                $('.custom-selector').select2();
            });
        </script>
    @endpush
@endsection
