<?php
session_start();
require_once('LineLogin.php');

if (!isset($_SESSION['profile'])) {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../" />
    <title>Appointment</title>
    <meta charset="utf-8" />
    <meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Metronic - Bootstrap Admin Template, HTML, VueJS, React, Angular. Laravel, Asp.Net Core, Ruby on Rails, Spring Boot, Blazor, Django, Express.js, Node.js, Flask Admin Dashboard Theme & Template" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="lassie/theme/dist/assets/media/logos/favicon.ico" />
    <!--begin::Fonts(mandatory for all pages)-->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" /> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="lassie/theme/dist/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="lassie/theme/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="lassie/theme/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->


</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-sidebar-stacked="true" data-kt-app-sidebar-secondary-enabled="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid mt-10">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-lg-row">
                <!--begin::Card-->
                <div class="card mb-5">
                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::Summary-->
                        <!--begin::User Info-->
                        <div class="d-flex flex-center flex-column py-5">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-100px symbol-circle mb-7">
                                <img src="<?php echo $_SESSION['profile']->picture; ?>" alt="image" />
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Name-->
                            <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3"></a>
                            <!--end::Name-->
                            <!--begin::Position-->
                            <div class="mb-3">
                                <!--begin::Badge-->
                                <div class="badge badge-lg badge-light-primary d-inline"><?= $_SESSION['profile']->name; ?></div>
                                <!--begin::Badge-->
                            </div>
                            <!--end::Position-->
                            <!--begin::Info-->
                            <!--begin::Info heading-->
                            <div class="fw-bold mb-9"><?= $_SESSION['profile']->email; ?></div>
                            <div hidden class="fw-bold mb-9">Line ID: <?= $_SESSION['profile']->sub; ?></div>
                            <!--end::User Info-->
                            <!--begin::Badge-->
                            <a href="lassie/logout.php"><div class="btn btn-primary d-inline mb-3">Logout</div></a>
                            <!--begin::Badge-->
                        </div>
                        <!--end::Card body-->

                    </div>
                    <!--end::Card-->

                </div>

                <!--end::Layout-->
            </div>
            <!--begin::Card-->
            <div class="card mb-5">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title fs-3 fw-bold">จองคิว</div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Form-->
                <form class="form" action="/payment_success_post.php" method="post" enctype="multipart/form-data">
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        <!--begin::Row-->
                        <div class="row mb-8">
                           
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row mb-8">
                            <!--begin::Row-->
                            <div class="row">
                                <div class="card-title">
                                    <h4 c[lass="fw-bold">กรุณากรอกข้อมูลติดต่อ สำหรับทำนัดหมาย</h4>
                                </div>
                            </div>
                            <!--end::Row-->
                            <div class="row">
                                <div class="col">
                                    <!--begin::Input group-->
                                    <div class="fv-row">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">ชื่อ</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" readonly class="fullname form-control form-control-solid" name="fullname" value="<?= $_SESSION['profile']->name; ?>" />
                                        <input type="hidden" class="name form-control form-control-solid" id="name" name="name" value="<?= $_SESSION['profile']->name; ?>" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            </div>
                                <div class="col" hidden>
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">สถานที่นัดหมาย</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-select" id="chklocation">
                                            <option value="1">ณ.สถานที่ Private ติด BTS อารีย์</option>
                                            <option value="2">นอกสถานที่</option>
                                        </select>
                                        
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            </div>
                            <div class="row" hidden>
                                <div class="col" id="collocation">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">หมายเหตุ: กรณีนอกสถานที่ ให้บริการหลังจาก 21:00 น. เป็นต้นไป เท่านั้นครับ</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="location form-control form-control-solid" name="location" value="" />
                                        
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">อีเมล</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="email" class="email form-control form-control-solid" id="email" name="email" value="" />
                                        <!-- <span class="fs-7 text-muted mb-15">เพื่อให้ระบบจัดส่งสลิปค่ามัดจำ</span> -->
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">เบอร์โทร</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="number" onKeyDown="if(this.value.length==10 && event.keyCode!=8) return false;" class="mobile form-control form-control-solid" name="mobile" value="" />
                                        <!-- <span class="fs-7 text-muted mb-15">เพื่อผลประโยชน์ของคุณลูกค้า โปรดกรอกหมายเลขโทรศัพท์สำหรับติดตามนัดหมาย แต่หากไม่สะดวก สามารถกรอกหมายเลข 0636352364</span> -->
                                        
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Input-->
                                        <input type="hidden" class="form-control form-control-solid" id="userid" name="userid" value="<?= $_SESSION['profile']->sub; ?>" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-xl-9 fv-row mb-7">
                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                            <span class="required">บริการการจอง</span>
                                            <span class="ms-1" data-bs-toggle="tooltip" title="Select an option.">
                                                <i class="ki-duotone ki-information text-gray-500 fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                            </span>
                                        </label>
                                        <div class="border rounded">
                                            <select id="kt_docs_select2_rich_content" class="form-select form-select-transparent" name="package" data-placeholder="เลือกบริการการจอง">
                                               <option></option>
                                                <?php
                                                    include('connect.php');
                                                    $sqlPackage = "select * from package where compcode = 'lassie'" or die("Error:" . mysqli_error($conn));
                                                    $resultPackage = mysqli_query($conn,$sqlPackage);
                                                    while (($rowPackage = mysqli_fetch_assoc($resultPackage))){?>
                                                      <option value="<?=$rowPackage['pcode'];?>" data-bs-toggle="modal" data-bs-target="#selectPackage<?=$rowPackage['pcode'];?>"  data-kt-rich-content-icon="https://lassie.lumpsum.cloud/profile/<?=$rowPackage['image'];?>"><?=$rowPackage['pname'];?></option>
                                                      
                                                <?php 
                                                    } 
                                                ?>
                                            </select>
                                            <input type="hidden" id="packagecode" name="packagecode" value="">
                                            <input type="hidden" id="packagename" name="packagename" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                     <div class="col-xl-3 mb-7">
                                        <div class="fs-6 fw-semibold mt-2 mb-3">วันที่ต้องการรับบริการ</div>
                                    </div>
                                </div>
                            </div>  
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-9 mb-8 fv-row">
                                <div class="position-relative d-flex align-items-center">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                    <span class="svg-icon position-absolute ms-4 mb-1 svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
                                            <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
                                            <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <input class="form-control form-control-solid ps-12" name="startbook" placeholder="Pick a date" id="kt_datepicker_1" value="<?= date("Y-m-d");?>"/>
                                </div>
                            </div>
                            <!--begin::Col-->
                           
                            <!--begin::Input wrapper-->
                            <div class="d-flex flex-column mb-8 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">เลือกเวลา</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Select an option.">
                                        <i class="ki-duotone ki-information text-gray-500 fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Buttons-->
                                <?php
                                    include('connect.php');
                                    $sqlCompany = "select adv_amount from company where compcode = 'lassie' limit 1" or die("Error:" . mysqli_error($conn));
                                    $resultCompany = mysqli_query($conn,$sqlCompany);
                                    while (($rowCompany = mysqli_fetch_array($resultCompany))){
                                      $dataCompany[] = $rowCompany; // add the row in to the results (data) array
                                    }
                                    $amount =   substr($dataCompany[0]['adv_amount'], 0, strpos($dataCompany[0]['adv_amount'], ".")).substr($dataCompany[0]['adv_amount'], -2) ;
                                    // $decimal =   substr($dataCompany[0]['adv_amount'], -2) ;
                                ?>
                                <div id="loadtime">
                                   
                                <!-- </div> -->
                            </div>
                            <!--end::Input wrapper-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Separator-->
                        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-primary-200"></div>
                        <!--end::Separator-->
                        <!--begin::Col-->
                        <div class="row" hidden>
                            <div class="col">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">จำนวนเงินมัดจำ</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"></i>
                                    </label>
                                    <!--begin::Input-->
                                    <input type="text" readonly class="form-control form-control-solid" id="amount" name="amount" value="<?= number_format($dataCompany[0]['adv_amount'],2); ?>" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                        </div>
                         <!--begin::Col-->
                    </div>
                    <div class="form-check form-check-custom justify-content-center form-check-solid form-check-sm mb-5">
                        <input class="form-check-input" type="checkbox" value="" id="flexRadioLg"/>
                        <label class="form-check-label" for="flexRadioLg">
                            📌เงื่อนไขในการจองคิว ปรึกษาพี่เภสัชกร ฟรี🌸
                        </label>
                    </div>
                    <!--end::Card body-->
                    <!--begin::Card footer-->
                    <!-- <div class="card-footer d-flex justify-content-center py-6 px-9 gap-2">
                        <button type="button" class="btn btn-primary" id="payment">ชำระเงิน</button>
                    </div> -->
                    <div class="card-footer d-flex justify-content-center py-6 px-9 gap-2">
                        <!-- <button type="button" class="btn btn-primary" id="confirm">ยืนยันการจอง</button> -->
                        <button type="button" class="btn btn-primary" id="kt_button_1">
                            <span class="indicator-label">
                                ยืนยันการจอง
                            </span>
                            <span class="indicator-progress">
                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                    <!--end::Card footer-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Card-->
            <!--end::Content container-->

        </div>
        <!--end::Content-->
        
        <?php  
        include('connect.php');
        $sqlPackage = "select * from package where compcode = 'lassie'" or die("Error:" . mysqli_error($conn));
        $resultPackage = mysqli_query($conn,$sqlPackage);
        while (($rowPackage = mysqli_fetch_assoc($resultPackage))){?>
        <!--begin::Modal-->
        <div id="selectPackage<?=$rowPackage['pcode'];?>" class="modal fade" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="min-height: 590px;">
                    <div class="modal-header py-5">
                        <div class="d-flex align-items-center">
                            <img src="https://lassie.lumpsum.cloud/profile/<?=$rowPackage['image'];?>" class="rounded-circle w-40px h-40px me-3" alt=""/>
                            <h5 class="modal-title"> Packege Name : <?=$rowPackage['pname'];?>
                        </div>
                        
                         <span class="d-block text-muted font-size-sm" id="subproject"></span></h5>
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                    </div>
                    <div class="modal-body">
                        <?php 
                            $sqlfile = "select * from package_file where compcode = 'lassie' and package_code = '".$rowPackage['pcode']."'" or die("Error:" . mysqli_error($conn));
                            $resultfile = mysqli_query($conn,$sqlfile);
                            while (($rowfile = mysqli_fetch_assoc($resultfile))){?>
                                <div class="text-center">
                                    <img src="https://lassie.lumpsum.cloud/uploads/<?=$rowfile['package_img'];?>" style="width: 300px; height: auto;"/>
                                 
                                </div>
                                <!-- <div class="table-responsive">
                                   <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-w-150px min-h-900px"
                                       style="background-image:url('https://lassie.lumpsum.cloud/uploads/<?=$rowfile['package_img'];?>')">
                                   </div>
                                </div> -->
                        <?php } ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light font-weight-bold" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Modal-->
        <?php } ?>
        <!--begin::Modal-->
        <div id="option" class="modal fade" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header py-5">
                        <div class="d-flex align-items-center">
                            <h5 class="modal-title"> 📌เงื่อนไขในการจองคิว ปรึกษาพี่เภสัชกร ฟรี🌸
                        </div>
                        
                         <span class="d-block text-muted font-size-sm" id="subproject"></span></h5>
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                    </div>
                    <div class="modal-body">
                       
                            <div class="table-responsive">
                                <!--begin::Datatable-->
                               <!--begin::Overlay-->
                               <!-- <a class="d-block overlay" data-fslightbox="lightbox-basic" href="https://bookok.lumpsum.cloud/profile/<?=$rowfile['image'];?>"> -->
                                   <!--begin::Image-->
                                   <h3><p>เงื่อนไขในการจองคิว ปรึกษาพี่เภสัชกร ฟรี</p></h3>
                                   
                                   <p>1.ให้ข้อมูลประวัติส่วนตัว (ข้อมูลเก็บเป็นความลับ)</p>
                                   <p>2.โทรผ่านไลน์เท่านั้น</p>
                                   
                                   <p>💌 เลื่อนคิวหรือยกเลิกแจ้งก่อน 24 ชั่วโมง</p><p>(ไม่แจ้งล่วงหน้ามีค่าใช้จ่ายนะคะ)</p>
                                   
                                   <p>🧸ไม่ต้องกังวล พี่เภสัชน่ารักมาก เฟรนลี่ ปรึกษาเรื่องปัญหาสุขภาพได้เลย</p>
                                   
                                   <p>📮ประเมินความพึ่งพอใจ เพื่อทางแบรนด์จะได้แก้ไขปรับปรุง</p>
                                   <!--end::Image-->
                               
                                   <!--begin::Action-->
                                   <!-- <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                       <i class="bi bi-eye-fill text-white fs-3x"></i>
                                   </div> -->
                                   <!--end::Action-->
                               <!-- </a> -->
                               <!--end::Overlay-->
                                <!--end::Datatable-->
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light font-weight-bold" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Modal-->
</body>
<!--begin::Javascript-->
<script>
    var hostUrl = "lassie/theme/dist/assets/";
</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="lassie/theme/dist/assets/plugins/global/plugins.bundle.js"></script>
<script src="lassie/theme/dist/assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="lassie/theme/dist/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="lassie/theme/dist/assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<!-- <script src="https://preview.keenthemes.com/html/metronic/docs/assets/js/custom/documentation/base/forms/advanced.js"></script> -->
<!--end::Custom Javascript-->
<!--end::Javascript-->
<script>
    // Element to indecate
    var button = document.querySelector("#kt_button_1");
    
    // Handle button click event
    button.addEventListener("click", function() {
        // Activate indicator
        button.setAttribute("data-kt-indicator", "on");
    
        // Disable indicator after 3 seconds
        setTimeout(function() {
            button.removeAttribute("data-kt-indicator");
        }, 3000);
    });
</script>
<script>
    const collocation = document.getElementById("collocation");
    collocation.style.display = "none";
     $("#chklocation").on('change',function(){
        var select = document.getElementById('chklocation');
        var value = select.options[select.selectedIndex].value;
        if (value == 1) {
            collocation.style.display = "none";
            $(".location").val('ณ.สถานที่ Private ติด BTS อารีย์');
        }else{
            collocation.style.display = "block";
            $(".location").val("");
        }
        
    });
    
    const options = document.querySelectorAll('[data-kt-docs-advanced-forms="interactive"]');
    const inputEl = document.querySelector('[name="bookingtime"]');
    options.forEach(option => {
        option.addEventListener('click', e => {
            e.preventDefault();

            inputEl.value = e.target.innerText;
        });
    });
</script>

<script>
 document.getElementById("kt_button_1").disabled = true;
    $("#flexRadioLg").on("click",function(){
        if (this.checked) {
            $('#option').modal('show');
             document.getElementById("kt_button_1").disabled = false;
        } else {
           document.getElementById("kt_button_1").disabled = true;
        }
        
        
    });
    $("#kt_button_1").on('click',function(){
         var userid = $("#userid").val();
         const bookingtime = $(".bookingtime").val();
         var location = $(".location").val();
         const mobile = $(".mobile").val();
         const bookingdate = $("#kt_datepicker_1").val();
         console.log(bookingdate);
         const amount = '<?=$amount;?>';
         var email = $("#email").val();
         var fullname = $(".fullname").val();
         var linename = '<?= $_SESSION['profile']->name; ?>';
         var packagecode = $("#packagecode").val();
         var packagename = $("#packagename").val();
         if(!fullname){
             Swal.fire(
                 "กรุณากรอกชื่อ",
             );
         }else if(!mobile){
             Swal.fire(
                  "กรุณากรอกเบอร์โทร",
              );
         }else if(!email){
             Swal.fire(
                   "กรุณากรอกอีเมล",
               );
         }else if(!bookingtime){
             Swal.fire(
                   "กรุณาเลือกเวลา",
               );
         }else if(!packagecode){
             Swal.fire(
                   "กรุณาเลือก Package",
               );
         }else{
             $.ajax({
                url: "https://lineoa-appoint.lumpsum.cloud/lassie/payment_success_post.php",
                type: "POST",
                data: {
                    "userid": userid,
                    "startbook": bookingdate,
                    "timebook": bookingtime,
                    "name": linename,
                    "location": location,
                    "mobile": mobile,
                    "amount": amount,
                    "email": email,
                    "fullname": fullname,
                    "packagecode" : packagecode,
                    "packagename" : packagename,
                },
                success: function(result) {
                    // console.log(result);
                    Swal.fire(
                         "จองเสร็จเรียบร้อยแล้ว",
                     );
                     setInterval(function() {
                        window.location.href = `lassie/welcome.php`;
                    },1000);
                }
             });
         }
    });
    // $("#payment").on('click', function() {
    //     // alert('payment');
    //     var userid = $("#userid").val();
    //     const bookingtime = $(".bookingtime").val();
    //     var location = $(".location").val();
    //     const mobile = $(".mobile").val();
    //     const bookingdate = $("#kt_datepicker_1").val();
    //     const amount = '<?=$amount;?>';
    //     var email = $("#email").val();
    //     var fullname = $(".fullname").val();
    //     var linename = '<?= $_SESSION['profile']->name; ?>';
    //     var settings = {
    //         "url": "https://api.stripe.com//v1/checkout/sessions",
    //         "method": "POST",
    //         "timeout": 0,
    //         "headers": {
    //             "Content-Type": "application/x-www-form-urlencoded",
    //             // "Authorization": "Bearer sk_test_51MrEYHDc3w85uOW5QPx41FjLYhD0TE7Czckyj1XGRiPU4TjfzW2oZUGL5zSEbyTHP10fsGoEvx0I3KkNJVhjRy4T006iKf7rFb"
    //             "Authorization": "Bearer sk_test_51M6yNDLTePUn3yeSBpWoHT5cPRnww1cViVSD5GvNJqr837D2A7oRk6CIRMY3SXXGEAzQNqLIv0WHvllEURRjtOoD00ft6DD9rA"
    //         },
    //         "data": {
    //             "cancel_url": "lassie/welcome.php",
    //             "success_url": "lassie/payment_success.php?userid=" + userid + "&startbook=" + encodeURIComponent(bookingdate) + "&timebook=" + encodeURIComponent(bookingtime) + "&name=" + encodeURIComponent(linename) +"&location="+ encodeURIComponent(location) +"&mobile="+mobile + "&amount="+ amount + "&email="+ email + "&fullname="+ encodeURIComponent(fullname),
    //             "customer_email": email,
    //             "line_items[0][price_data][currency]": "thb",
    //             "line_items[0][price_data][product_data][name]": "ชำระมัดจำ วันที่ "+ bookingdate + " เวลา " + bookingtime,
    //             "line_items[0][price_data][unit_amount]": "<?=$amount;?>",
    //             "line_items[0][quantity]": "1",
    //             "mode": "payment",
    //             "payment_method_types[0]": "card",
    //             "payment_method_types[1]": "promptpay",
    //             "phone_number_collection[enabled]": "true"
    //         }
    //         };
    //         if(!fullname){
    //         alert('กรุณากรอกชื่อ');
    //     }else if(!mobile){
    //         alert('กรุณากรอกเบอร์โทร');
    //     }else if(!email){
    //         alert('กรุณากรอกอีเมล');
    //     }else if(!bookingtime){
    //         alert('กรุณาเลือกเวลา');
    //     }else{
    //         $.ajax(settings).done(function(response) {
    //             // var fullname = $(".fullname").val();
    //             // var location = $(".location").val();
    //             // var name = $("#name").val();
    //             // const bookingdate = $("#kt_datepicker_1").val();
    //             // const bookingtime = $(".bookingtime").val();
    //             // var userid = $("#userid").val();
    //             // alert(" วันที่ :" + bookingdate +" เวลา : " + bookingtime );
    //             console.log($.trim(response.url));
    //             // $.ajax({
    //             // url: 'lassie/insert_appointment.php',
    //             // type: 'POST',
    //             // data: {name: fullname,  email:'<?= $_SESSION['profile']->email; ?>', startbook: bookingdate, timebook: bookingtime, fullname: fullname, location: location, mobile: mobile, userid: '<?= $_SESSION['profile']->sub; ?>'},
    //             // }).done(function(data) {
    //             //     console.log(data);
    //             //     // var json = jQuery.parseJSON($.trim(data));
    //             //     // console.log($.trim(json.status));
    //             //     // Swal.fire(
    //             //     //         $.trim(json.code),
    //             //     //         "Cancelled completed.",
    //             //     //         "success"
    //             //     //     )
    //             //     // $(".tagstatus").html('<span class="label label-lg label-light-danger label-inline">ยกเลิกเอกสาร</span>');
    //             //     // $('#save').prop('disabled',true);
    //             // });
    //                 window.location.href = `${response.url}`;
    //            
    //         });
    //     }
    // });
    var date = $("#kt_datepicker_1").val();
    $("#loadtime").load('lassie/loadtime.php?vardate='+date);
    console.log(date);
    $("#kt_datepicker_1").on('change',function() {
        var date = $("#kt_datepicker_1").val();
        console.log(date);
        $("#loadtime").load('lassie/loadtime.php?vardate='+date);
    })
</script>

<script>
    // $("#location").hide();
    $(function() {
      $( "#kt_datepicker_1" ).flatpickr({  dateFormat: "Y-m-d",minDate: "today" });
    });
    
    
    // Format options
    const optionFormat = (item) => {
        if (!item.id) {
            return item.text;
        }
    
        var span = document.createElement('span');
        var template = '';
    
        template += '<div class="d-flex align-items-center">';
        template += '<img src="' + item.element.getAttribute('data-kt-rich-content-icon') + '" class="rounded-circle w-40px h-40px me-3" alt="' + item.text + '"/>';
        template += '<div class="d-flex flex-column">'
        template += '<span class="fs-4 fw-bold lh-1">' + item.text + '</span>';
        template += '</div>';
        template += '</div>';
    
        span.innerHTML = template;
    
        return $(span);
    }
    
    // Init Select2 --- more info: https://select2.org/
    $('#kt_docs_select2_rich_content').select2({
        placeholder: "Select an option",
        minimumResultsForSearch: Infinity,
        templateSelection: optionFormat,
        templateResult: optionFormat
    });
    
    $('#kt_docs_select2_rich_content').on('select2:select', function (e) {
        var data = e.params.data;
        $('#packagecode').val(data.id);
        $('#packagename').val(data.text);
        console.log(data);
        $("#selectPackage"+data.id).modal('show');
    });
    </script>
</html>
