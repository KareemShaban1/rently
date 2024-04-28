<div class="aside-toolbar flex-column-auto" id="kt_aside_toolbar">
    <!--begin::User-->
    <div class="aside-user d-flex align-items-sm-center justify-content-center py-5">
        <!--begin::Symbol-->
        <div class="symbol symbol-50px">
            <img src="{{ asset('backend/media/avatars/150-26.jpg') }}" alt="" />
        </div>
        <!--end::Symbol-->
        <!--begin::Wrapper-->
        <div class="aside-user-info flex-row-fluid flex-wrap ms-5">
            <!--begin::Section-->
            <div class="d-flex">
                <!--begin::Info-->
                <div class="flex-grow-1 me-2">
                    <!--begin::Username-->
                    <a href="#" class="text-white text-hover-primary fs-6 fw-bold">
                        {{-- {{ Auth::user()->name }} --}}
                    </a>
                    <!--end::Username-->
                    <!--begin::Description-->
                    {{-- <span class="text-gray-600 fw-bold d-block fs-8 mb-1">Python Dev</span> --}}
                    <!--end::Description-->
                    <!--begin::Label-->
                    <div class="d-flex align-items-center text-success fs-9">
                        <span class="bullet bullet-dot bg-success me-1"></span>online
                    </div>
                    <!--end::Label-->
                </div>
                <!--end::Info-->
                <!--begin::User menu-->

            </div>
            <!--end::Section-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::User-->

    <!--end::Aside user-->
</div>
