<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./lib/bootstrap.css">
    <script src="/lib/jquery.js"></script>

</head>

<body>
    <div class="container">

        <form class="form " id="birthdayReminderForm" method="post" enctype="multipart/form-data" autocomplete="off"
            action="post.php">
            <input class="form-contol" type="hidden" name="action" value="storeBirthdayReminder" />

            <div class="alert alert-danger">

                <span class="close">
                    &times;
                </span>
                <b>Error!</b>
                <span class="message-body">
                    Sorry, Email has already been taken
                </span>
            </div>

            <h5 class="is-size-3 has-text-weight-bold">Your Information</h5>
            <div class="field">
                <label class="control-label col-sm-2" for="title" kclass="label">Title</label>
                <div class="select is-fullwidth">
                    <select id="title" name="title">
                        <option value="Baby" selected disabled>-- Title --</option>
                        <option value="Baby">Baby</option>
                        <option value="Master">Master</option>
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Brother">Brother</option>
                        <option value="Sister">Sister</option>
                        <option value="Doctor">Doctor</option>
                        <option value="Deacon">Deacon</option>
                        <option value="Deaconess">Deaconess</option>
                        <option value="Evangelist">Evangelist</option>
                        <option value="Pastor">Pastor</option>
                    </select>
                </div>
            </div>
            <div class="field">
                <label class="control-label col-sm-2" class="label">Full Name</label>
                <div class="control">
                    <input class="form-contol" class="input" type="text" placeholder="Surname Firstname" id="fullname"
                        name="fullname">
                </div>
            </div>
            <div class="field">
                <label class="control-label col-sm-2" class="label">Email</label>
                <div class="control">
                    <input class="form-contol" class="input" type="email" placeholder="Valid Email Address" id="email"
                        name="email">
                </div>
            </div>
            <div class="field">
                <label class="control-label col-sm-2" class="label">Phone</label>
                <div class="control">
                    <input class="form-contol" class="input" type="tel" placeholder="Input Phone Number" id="phone"
                        name="phone">
                </div>
            </div>
            <div class="field">
                <label class="control-label col-sm-2" class="label">Birthday</label>
                <div class="control">
                    <input class="form-contol" class="input" type="date" placeholder="Select Birthday" id="birthday"
                        name="birthday">
                </div>
            </div>

            <div class="field">
                <div class=name id="gifting-initiative"></div>
            </div>

            <div class="field">
                <div class="file has-name is-medium is-info">
                    <label class="control-label col-sm-2" class="file-label is-fullwidth">
                        <input class="form-contol" data-extension="personal_extension" class="file-input select-image"
                            type="file" accept="image/jpg, image/jpeg, image/png" name="personal_pix">
                        <span class="file-cta"><span class="file-icon"><i class="fa fa-upload fa-md"></i></span><span
                                class="file-label">Personal
                                Picture</span></span><span class="file-name is-fullwidth">Picture
                            Name</span>
                    </label>
                </div>
            </div>
            <div class="field">
                <div class="file has-name is-medium is-info">
                    <label class="control-label col-sm-2" class="file-label is-fullwidth">
                        <input class="form-contol" data-extension="family_extension" class="file-input select-image"
                            type="file" accept="image/jpg, image/jpeg, image/png" name="family_pix">
                        <span class="file-cta"><span class="file-icon"><i class="fa fa-upload fa-md"></i></span><span
                                class="file-label">Family
                                Picture</span></span><span class="file-name is-fullwidth">or Picture
                            Name</span>
                    </label>
                </div>
            </div>
            <div class="field" style="display: none;">
                <div class="image" id="gifting-initiative"></div>
            </div>

            <div class="field">
                <div class="control">
                    <button class="button is-medium is-info is-rounded is-fullwidth is-birthday-stamp" id=""
                        type="submit">Submit</button>
                </div>
            </div>
            <!-- <div class="field"><button type="submit" class="button is-info is-medium is-fullwidth is-birthday-stamp" value="SUBMIT">SUBMIT</button><input class="form-contol"  type="submit" class="button is-info is-medium is-fullwidth is-birthday-stamp" value="SUBMIT" /></div> -->
        </form>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>




        <form enctype="multipart/form-data" role="form" class="form-horizontal" method="POST" action="POST.PHP">


            <!--   title  fullname  email   phone    dob    personal    family    -->






            <div class="form-group">
                <label class="control-label col-sm-2" for="title">Title:</label>
                <div class="col-sm-10">


                    <select id="title" name="title" class="form-control">
                        <option value="Baby" selected disabled>-- Title --</option>
                        <option value="Baby">Baby</option>
                        <option value="Master">Master</option>
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Brother">Brother</option>
                        <option value="Sister">Sister</option>
                        <option value="Doctor">Doctor</option>
                        <option value="Deacon">Deacon</option>
                        <option value="Deaconess">Deaconess</option>
                        <option value="Evangelist">Evangelist</option>
                        <option value="Pastor">Pastor</option>
                    </select>

                </div>
            </div>





            <div class="form-group">
                <label class="control-label col-sm-2" for="fullname">Full Name:</label>
                <div class="col-sm-10">

                    <input type="text" class="form-control" id="fullname" placeholder="Surname Firstname">
                </div>
            </div>





            <div class="form-group">
                <label class="control-label col-sm-2" for="phone">Phone Number:</label>
                <div class="col-sm-10">

                    <input type="tel" class="form-control" id="phone">
                </div>
            </div>



            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email Address:</label>
                <div class="col-sm-10">

                    <input type="email" class="form-control" id="email">
                </div>
            </div>



            <div class="form-group">
                <label class="control-label col-sm-2" for="password">Password:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password">
                </div>
            </div>












            <input class="form-contol" data-extension="personal_extension" class="file-input select-image" type="file"
                accept="image/jpg, image/jpeg, image/png" name="personal_pix">


            <input class="form-contol" data-extension="family_extension" class="file-input select-image" type="file"
                accept="image/jpg, image/jpeg, image/png" name="family_pix">




            <center>

                <button type="submit" class="btn btn-default">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </center>
        </form>









        <br>


    </div>




</body>

</html>