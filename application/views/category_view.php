<!DOCTYPE html>

<head>
    <!-- Required Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- <link href="/external/js/bootstrap-treeview-1.2.0/dist/bootstrap-treeview.min.css" rel="stylesheet"> -->

    <!-- Required Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!-- <script src="/external/js/bootstrap-treeview-1.2.0/dist/bootstrap-treeview.min.js"></script> -->
    <script src="/external/js/tree.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="/external/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="wrapper">

        <header class="main-header">
            <h4 class="heading-top">Categories</h4>
        </header>
    </div>
    <div class="col-md-12 ">
        <a href="/Category/AddCategory/0/" class="btn btn-success AddCategory" id="AddCategory"><span class="fa  fa-plus span_icon_padding_left"></span>&nbsp;&nbsp;Add Root Category</a>
    </div>
    <div class="col-md-12 mt-2">
        <a href="/Category/AddCategory/<?= (isset($CategoryData) ? $ID : $Type) ?>" class="btn btn-success AddCategory" id="AddSubCategory"><span class="fa  fa-plus span_icon_padding_left"></span>&nbsp;&nbsp;Add Subcategory</a>
    </div>
    <div class="col-md-12 mt-2">
        <button type="button" class="btn btn-default" id="Expand">Expand All</button>
    </div>
    <nav class="navbar navbar-static-top col-md-3" role="navigation">

        <!-- <div class="row"> -->
        <!-- <div class="col-md-3"> -->
        <ul id="tree1">
            <?= $tree ?>

            <!-- <li class="Main Group"><a href="#">TECH</a>

                <ul>
                    <li>Company Maintenance</li>
                    <li>Employees
                        <ul>
                            <li>Reports
                                <ul>
                                    <li>
                                        Test <ul>
                                            <li>Report1</li>
                                            <li>Report2</li>
                                            <li>Report3</li>
                                        </ul>
                                    </li>
                                    <li>Report2</li>
                                    <li>Report3</li>
                                </ul>
                            </li>
                            <li>Employee Maint.</li>
                        </ul>
                    </li>
                    <li>Human Resources</li>
                </ul>
            </li>
            <li class="Main Group">XRP
                <ul>
                    <li>Company Maintenance</li>
                    <li>Employees
                        <ul>
                            <li>Reports
                                <ul>
                                    <li>Report1</li>
                                    <li>Report2</li>
                                    <li>Report3</li>
                                </ul>
                            </li>
                            <li>Employee Maint.</li>
                        </ul>
                    </li>
                    <li>Human Resources</li>
                </ul>
            </li> -->
            <!-- </ul> -->
            <!-- </div> -->


            <!-- </div> -->
    </nav>
    <div class="col-md-9">
        <section class="content">
            <form method="post" id="Form" enctype="multipart/form-data" action="/Category/SaveCategory">
                <input type="hidden" name="Type" id="Type" value="<?= isset($Type) ? $Type : 0 ?>" >
                <input type="hidden" name="ID" id="ID" value="<?= isset($ID) ? $ID : '' ?>">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-widget">
                            <div class="box-body">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">General</a></li>
                                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Image</a></li>
                                    <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">SEO</a></li>

                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="col-md-12 nopadding-left nopadding-right">
                                            <!-- <div class="col-md-6 nopadding-left nopadding-right"> -->
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    &nbsp;
                                                </div>
                                            </div>

                                            <!-- </div> -->

                                            <div class="col-md-12 nopadding-left nopadding-right">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        &nbsp;
                                                    </div>
                                                </div>
                                                <div class="col-md-12 nopadding">
                                                    <label for="Category" class="col-sm-3 control-label">ID</label>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" name="CategoryID" id="CategoryID" value="<?= (isset($CategoryData) ? $CategoryData[0]->ID : $Max_ID) ?>" class="form-control" readonly>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 nopadding-left nopadding-right">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        &nbsp;
                                                    </div>
                                                </div>
                                                <div class="col-md-12 nopadding">
                                                    <label for="Department" class="col-sm-3 control-label">Name</label>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" name="CategoryName" id="CategoryName" value="<?= (isset($CategoryData) ? $CategoryData[0]->Name : '') ?>" class="form-control" required />

                                                    </div>
                                                </div>
                                            </div>


                                            <!-- </div> -->
                                            <div class="col-md-12 nopadding-left nopadding-right">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        &nbsp;
                                                    </div>
                                                </div>
                                                <div class="col-md-12 nopadding">
                                                    <label for="Details" class="col-sm-3 control-label">Searchable</label>
                                                    <div class="col-md-9 form-group">

                                                        <input type="checkbox" name="Searchable" id="Searchable" value="1" <?= (isset($CategoryData) && !empty($CategoryData[0]->Searchable) ? 'checked' : '') ?>>&nbsp; Show this category in search box category list
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 nopadding-left nopadding-right">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        &nbsp;
                                                    </div>
                                                </div>
                                                <div class="col-md-12 nopadding">

                                                    <label for="InvoiceDetails" class="col-sm-3 control-label">Status</label>
                                                    <div class="col-md-4 form-group">

                                                        <input type="checkbox" name="Status" id="Status" value="1" <?= (isset($CategoryData) && !empty($CategoryData[0]->Status) ? 'checked' : '') ?>>&nbsp; Enable the category

                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_2">
                                        <div class="col-md-12 nopadding-left nopadding-right">
                                            <div class="col-md-6 nopadding-left nopadding-right">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        &nbsp;
                                                    </div>
                                                </div>
                                                <div class="col-md-12 nopadding">

                                                    <label for="DefaultImage" class="col-sm-3 required control-label ">Image :</label>

                                                    <div class="form-group col-sm-9">

                                                        <span class="users-list-date">(Click or drag image here)</span>

                                                        <div class="DefaultImage" id="uploader" onclick="$('#DefaultImage').click()" style="text-align: center; height: 250px;">
                                                            <img onerror="imgError(this);" height="100%" src="/<?= (isset($CategoryData) && !empty($CategoryData[0]->Image) ? ($CategoryData[0]->Image) : '/external/images/drag.png') ?>" />
                                                            <input type="file" name="DefaultImage" id="DefaultImage" value="" class="filePhoto FormInput">
                                                        </div>
                                                        <!-- <span class="users-list-date">(We recommend 570x380 resolution images)</span> -->

                                                        <?php
                                                        // $script = " var imageLoader = document.getElementById('DefaultImage'); \n";
                                                        // $script .= " imageLoader.addEventListener('change', DefaultImage, false);\n";
                                                        // $script .= " function DefaultImage(e) { \n var reader = new FileReader(); \n reader.onload = function(event) { $('.DefaultImage img').attr('src', event.target.result);\n } \n reader.readAsDataURL(e.target.files[0]); \n }\n";
                                                        ?>

                                                    </div>

                                                </div>
                                                <!-- <br> -->





                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        &nbsp;
                                                    </div>
                                                </div>

                                            </div>
                                        </div>





                                    </div>

                                    <div class="tab-pane" id="tab_3">
                                        <div class="col-md-12 nopadding-left nopadding-right">
                                            <div class="col-md-12 nopadding-left nopadding-right">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        &nbsp;
                                                    </div>
                                                </div>



                                                <div class="col-md-10 nopadding">
                                                    <label for="MetaTitle" class="col-sm-2 control-label">Meta Title</label>
                                                    <div class="col-md-10 form-group">

                                                        <textarea type="text" name="MetaTitle" id="MetaTitle" class="form-control FormInput" rows="10" style="resize: none;"><?= (isset($CategoryData) ? $CategoryData[0]->MetaTitle : '') ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-10 nopadding">
                                                    <label for="MetaTag" class="col-sm-2 control-label">Meta Tag</label>
                                                    <div class="col-md-10 form-group">

                                                        <textarea type="text" name="MetaTag" id="MetaTag" rows="10" class="form-control FormInput" style="resize: none;"><?= (isset($CategoryData) ? $CategoryData[0]->MetaTag : '') ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-10 nopadding">
                                                    <label for="MetaDescription" class="col-sm-2 control-label">Meta Description</label>
                                                    <div class="col-md-10 form-group">

                                                        <textarea type="text" name="MetaDescription" id="MetaDescription" rows="10" class="form-control FormInput" style="resize: none;"><?= (isset($CategoryData) ? $CategoryData[0]->MetaDescription : '') ?></textarea>
                                                    </div>
                                                </div>


                                            </div>

                                            <!--          -------------  Second Part---------           -->

                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                &nbsp;
                                            </div>
                                        </div>



                                    </div>
                                </div>
                                <div class="col-md-12 buttondiv" style="margin: 3% 0 0 30%;">
                                    <?php if (isset($ID)) { ?>
                                        <button type="button" name="EditProduct[<?= $ID ?>]"  id="EditProduct" value="Update" class="btn btn-success btn-sm SubmitButton">Update&nbsp;&nbsp;<span class="fa  fa-save span_icon_padding_left"></span></button>
                                    <?php } else { ?>
                                        <button type="button" name="AddProduct" id="AddProduct" value="Save" class="btn btn-success btn-sm SubmitButton">Save&nbsp;&nbsp;<span class="fa  fa-save span_icon_padding_left"></span></button>

                                    <?php } ?>
                                    <?php if (isset($ID)) { ?>
                                        <button type="button" name="DeleteProduct" id="DeleteProduct" value="Delete" class="btn btn-danger btn-sm SubmitButton">Delete</button>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>

    </div>
    <script>
        $(document).ready(function() {
            $('#tree1').treed();
            var imageLoader = document.getElementById("DefaultImage");
            imageLoader.addEventListener("change", DefaultImage, false);

            function DefaultImage(e) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $(".DefaultImage img").attr("src", event.target.result);
                };
                reader.readAsDataURL(e.target.files[0]);
            }
            <?php //if (isset($ID)) { ?>
                $("#Expand").click();
            <?php // } ?>



            // $(".AddCategory").on('click', function() {
            //     let Type = $("#Type").val();
            //     location.assign('/Category/AddCategory/' + Type);
            // });


            $(".SubmitButton").on('click', function() {
                if ($("#Type").val() !== '') {
                    if ($("#CategoryName").val() == '') {
                        alert("Category Name is required.")
                        $("#CategoryName").focus();
                    } else {
                        $(this).attr('type', 'submit');

                    }
                } else {
                    alert("Please select a Category Type")
                }

            });

            $("#DeleteProduct").on('click', function() {
                var ID = $("#ID").val();
                if (ID !== '') {
                    let flag = 0;
                    $(".CategoryAll").each(function() {
                        if ($(this).attr('subcatid') == ID) {
                            flag = 1;
                        }
                    })
                    if (flag == 0) {
                        $(this).attr('type', 'submit');
                    } else {
                        alert("Unable to delete this Category. It is already in use.")
                    }
                } else {
                    $(this).attr('type', 'submit');
                }

            });
            $(".CategoryAll").on("click", function() {
                $(".CategoryAll").removeClass("selectedCategory");
                $(this).addClass("selectedCategory");
            });
        })
    </script>
</body>