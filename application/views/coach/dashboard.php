<main role="main" class="Main">
    <div class="container-fluid m-0 Section Home">
        <div class="row m-0 HomeTab">
            <div class="col-lg-2 col-md-2 col-sm-6">
                <a href="" id="Promotion">
                    <img class="InActiveImg" src="<?= base_url('assets/users_assets/images/Icon9.png') ?>" alt="">
                    <img class="ActiveImg" src="<?= base_url('assets/users_assets/images/Icon15.png') ?>" alt="">
                    <p>Promotion Management</p>
                </a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-6">
                <a href="" id="Appearance">
                    <img class="InActiveImg" src="<?= base_url('assets/users_assets/images/Icon11.png') ?>" alt="">
                    <img class="ActiveImg" src="<?= base_url('assets/users_assets/images/Icon16.png') ?>" alt="">
                    <p>Appearance Management</p>
                </a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-6">
                <a href="" id="Event">
                    <img class="InActiveImg" src="<?= base_url('assets/users_assets/images/Icon12.png') ?>" alt="">
                    <img class="ActiveImg" src="<?= base_url('assets/users_assets/images/Icon17.png') ?>" alt="">
                    <p>Event Management</p>
                </a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-6">
                <a href="" id="Business">
                    <img class="InActiveImg" src="<?= base_url('assets/users_assets/images/Icon13.png') ?>" alt="">
                    <img class="ActiveImg" src="<?= base_url('assets/users_assets/images/Icon18.png') ?>" alt="">
                    <p>Business Management</p>
                </a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-6">
                <a href="" id="Network">
                    <img class="InActiveImg" src="<?= base_url('assets/users_assets/images/Icon14.png') ?>" alt="">
                    <img class="ActiveImg" src="<?= base_url('assets/users_assets/images/Icon19.png') ?>" alt="">
                    <p>Network Management</p>
                </a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-6">
                <a href="" id="Subscription">
                    <img class="InActiveImg" src="<?= base_url('assets/users_assets/images/Icon10.png') ?>" alt="">
                    <img class="ActiveImg" src="<?= base_url('assets/users_assets/images/Icon20.png') ?>" alt="">
                    <p>Subscription Management</p>
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid m-0 Section Promotion" style="display: none;">
        <!-- Add Promotion Button -->
        <button type="button" class="AddButton" data-bs-toggle="modal" data-bs-target="#AddPromotionModal">
            <i class="fa fa-plus" aria-hidden="true"></i>
            <p>Add Promotion</p>
        </button>

        <!-- Add Promotion Modal -->
        <div class="modal fade CustomModal" id="AddPromotionModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Promotion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3">
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Category</label>
                                <select>
                                    <option selected disabled value="">Choose a category</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Type</label>
                                <select>
                                    <option selected disabled value="">Choose a type</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Title</label>
                                <input type="text" placeholder="Enter title">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Upload File</label>
                                <input type="file" class="form-control" id="inputGroupFile01">
                            </div>
                            <div class="row m-0 pt-4 pb-2">
                                <div class="row m-0 InnerData g-3">
                                    <p class="Heading">Target Audience</p>
                                    <div class="col-md-4 col-sm-12">
                                        <label class="form-label">Gender</label>
                                        <select>
                                            <option selected disabled value="">Select gender</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label class="form-label">Age</label>
                                        <select>
                                            <option selected disabled value="">Select age range</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label class="form-label">Parental Status</label>
                                        <select>
                                            <option selected disabled value="">Select parental status</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label class="form-label">Household Income</label>
                                        <select>
                                            <option selected disabled value="">Select household income</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label class="form-label">Location</label>
                                        <input type="text" placeholder="Select location">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Select Promotion Plan</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Promotion Modal -->
        <div class="modal fade CustomModal" id="EditPromotionModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Promotion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3">
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Category</label>
                                <select>
                                    <option selected disabled value="">Choose a category</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Type</label>
                                <select>
                                    <option selected disabled value="">Choose a type</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Title</label>
                                <input type="text" placeholder="Enter title">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Upload File</label>
                                <input type="file" class="form-control" id="inputGroupFile01">
                            </div>
                            <div class="row m-0 pt-4 pb-2">
                                <div class="row m-0 InnerData g-3">
                                    <p class="Heading">Target Audience</p>
                                    <div class="col-md-4 col-sm-12">
                                        <label class="form-label">Gender</label>
                                        <select>
                                            <option selected disabled value="">Select gender</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label class="form-label">Age</label>
                                        <select>
                                            <option selected disabled value="">Select age range</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label class="form-label">Parental Status</label>
                                        <select>
                                            <option selected disabled value="">Select parental status</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label class="form-label">Household Income</label>
                                        <select>
                                            <option selected disabled value="">Select household income</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label class="form-label">Location</label>
                                        <input type="text" placeholder="Select location">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Select Promotion Plan</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Promotion Modal -->
        <div class="modal fade CustomModal" id="DeletePromotionModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Promotion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="InfoText">Do you really want your promotion to be deleted? It cannot be undone once
                            deleted.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Details Promotion Modal -->
        <div class="modal fade CustomModal" id="DetailsPromotionModal" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Promotion Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row PromotionDetail">
                            <div class="col-md-8 col-sm-12 PromotionImg">
                                <img class="w-100"
                                    src="https://img.freepik.com/free-photo/people-concert_1160-737.jpg?t=st=1730050734~exp=1730054334~hmac=4785251%E2%80%A6&w=900"
                                    alt="">
                            </div>
                            <div class="col-md-4 col-sm-12 PromotionData">
                                <img class="OwnerImg"
                                    src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=1760&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    alt="">
                                <p class="TitleText">Promotion Title</p>
                                <p class="OwnerText"><b>Owner:</b> Owner Name</p>
                                <ul>
                                    <li>Tag Item</li>
                                    <li>Tag Item</li>
                                    <li>Tag</li>
                                    <li>Tag Item</li>
                                    <li>Tag Item</li>
                                </ul>
                            </div>
                            <div class="col-md-12 col-sm-12 PromotionData">
                                <p class="BodyText">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod
                                    molestias nihil vero
                                    quisquam
                                    assumenda. Consequuntur fuga veritatis quasi voluptates eum soluta ea quos eaque,
                                    hic possimus
                                    ipsum? Dicta, quisquam natus. Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Cumque iusto
                                    autem rerum quibusdam pariatur saepe earum, laboriosam quam ab illo quod ad ut
                                    voluptatem.
                                    Consectetur, unde. Odit, beatae? Fugiat, magni. Lorem ipsum dolor sit, amet
                                    consectetur adipisicing
                                    elit. Nemo tempora delectus, officiis corrupti perspiciatis quam temporibus!
                                    Placeat, consectetur
                                    possimus ab accusantium itaque numquam ea. Dicta deserunt quae blanditiis eaque
                                    fuga. Lorem ipsum
                                    dolor sit amet, consectetur adipisicing elit. Voluptates perferendis illum earum
                                    tempore, voluptas,
                                    facilis ullam illo sed provident tenetur quod accusantium harum, numquam nam
                                    consectetur aut
                                    consequuntur sunt quaerat? Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Eaque aperiam
                                    in similique quibusdam, ex veniam. Ullam, minus! Sapiente suscipit pariatur eum
                                    aspernatur
                                    laudantium earum! Quaerat, molestias ullam! Dolorum, sit similique. Lorem ipsum
                                    dolor sit amet,
                                    consectetur adipisicing elit. Exercitationem odio iure corporis deleniti unde quo ab
                                    atque soluta
                                    quam porro commodi quae ut natus, in voluptates quia quod fugit sint.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row m-0 TabBar">
            <div class="Pagination">
                <a href="" id="Home"><i class="fa fa-angle-left" aria-hidden="true"></i> Home / Promotion Management</a>
            </div>

            <div class="TabContainer">
                <div class="Tab active" onclick="openTab(event, 'AllPromotion')">All Promotion</div>
                <div class="Tab" onclick="openTab(event, 'MyPromotion')">My Promotion</div>
            </div>
        </div>

        <div id="AllPromotion" class="row m-0 TabContent active">
            <div class="Card col-lg-3 col-md-3 col-sm-6">
                <div class="CardInner" data-bs-toggle="modal" data-bs-target="#DetailsPromotionModal">
                    <div class="Cover"></div>
                    <p class="Heading">Promotion Heading</p>
                    <p class="SubHeading">Promotion Details</p>
                </div>
            </div>
            <div class="Card col-lg-3 col-md-3 col-sm-6">
                <div class="CardInner" data-bs-toggle="modal" data-bs-target="#DetailsPromotionModal">
                    <div class="Cover"></div>
                    <p class="Heading">Promotion Heading</p>
                    <p class="SubHeading">Promotion Details</p>
                </div>
            </div>
            <div class="Card col-lg-3 col-md-3 col-sm-6">
                <div class="CardInner" data-bs-toggle="modal" data-bs-target="#DetailsPromotionModal">
                    <div class="Cover"></div>
                    <p class="Heading">Promotion Heading</p>
                    <p class="SubHeading">Promotion Details</p>
                </div>
            </div>
            <div class="Card col-lg-3 col-md-3 col-sm-6">
                <div class="CardInner" data-bs-toggle="modal" data-bs-target="#DetailsPromotionModal">
                    <div class="Cover"></div>
                    <p class="Heading">Promotion Heading</p>
                    <p class="SubHeading">Promotion Details</p>
                </div>
            </div>
            <div class="Card col-lg-3 col-md-3 col-sm-6">
                <div class="CardInner" data-bs-toggle="modal" data-bs-target="#DetailsPromotionModal">
                    <div class="Cover"></div>
                    <p class="Heading">Promotion Heading</p>
                    <p class="SubHeading">Promotion Details</p>
                </div>
            </div>
        </div>

        <div id="MyPromotion" class="row m-0 TabContent">
            <div class="Card col-lg-3 col-md-3 col-sm-6">
                <div class="CardInner" data-bs-toggle="modal" data-bs-target="#DetailsPromotionModal">
                    <div class="Cover"></div>
                    <p class="Heading">Promotion Heading</p>
                    <p class="SubHeading">Promotion Details</p>
                    <div class="IconContainer">
                        <a href="" data-bs-toggle="modal" data-bs-target="#EditPromotionModal">
                            <i class="fa fa-pencil-square" aria-hidden="true"></i>
                        </a>
                        <a href="" data-bs-toggle="modal" data-bs-target="#DeletePromotionModal">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid m-0 Section Appearance" style="display: none;">
        <!-- Send Invitation Button -->
        <button type="button" class="AddButton" data-bs-toggle="modal" data-bs-target="#AddAppearanceModal">
            <i class="fa fa-plus" aria-hidden="true"></i>
            <p>Send Invitation</p>
        </button>

        <!-- Send Invitation Modal -->
        <div class="modal fade CustomModal" id="AddAppearanceModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Send Invitation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3">
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Select Event</label>
                                <select>
                                    <option selected disabled value="">Select Event</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Select Athletics/Entertainer</label>
                                <select>
                                    <option selected disabled value="">Selct</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Price</label>
                                <input type="text" placeholder="Enter price">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Start Time</label>
                                <input type="time" placeholder="Time">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">End Time</label>
                                <input type="time" placeholder="Time">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <label class="form-label">Instructions</label>
                                <textarea type="text" placeholder="Description"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Send Appearance Modal 1 -->
        <div class="modal fade CustomModal" id="AppearanceModal1" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Accepted</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body AppearanceData">
                        <form class="row g-3">
                            <div class="col-md-6 col-sm-12 QRBlock">
                                <p>Scan QR code</p>
                                <img src="../assets/images/QRCode.png" alt="">
                            </div>
                            <div class="col-md-6 col-sm-12 BtnContainer w-50">
                                <button type="button" class="btn btn-primary">
                                    <span>
                                        <img src="../assets/images/Icon1.png" alt="">
                                    </span>
                                    <p>Appearance Initiated</p>
                                </button>
                                <button type="button" class="btn btn-primary">
                                    <span>
                                        <img src="../assets/images/Icon1.png" alt="">
                                    </span>
                                    <p>Appearance not attended</p>
                                </button>
                                <button type="button" class="btn btn-primary">
                                    <span>
                                        <img src="../assets/images/Icon2.png" alt="">
                                    </span>
                                    <p>Appearance ended</p>
                                </button>
                                <button type="button" class="btn btn-primary">
                                    <span>
                                        <img src="../assets/images/Icon3.png" alt="">
                                    </span>
                                    <p>Contact invitee</p>
                                </button>
                                <button type="button" class="btn btn-primary">
                                    <span>
                                        <img src="../assets/images/Icon4.png" alt="">
                                    </span>
                                    <p>Contact admin</p>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Send Appearance Modal 2 -->
        <div class="modal fade CustomModal" id="AppearanceModal2" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Final Offer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body AppearanceData">
                        <form class="row g-3">
                            <div class="col-md-6 col-sm-12 SmallDataBlock">
                                <p class="Heading">Send final offer</p>
                                <div class="BlockData1">
                                    <div class="BlockDataInner1">
                                        <span>
                                            <img src="../assets/images/Icon5.png" alt="">
                                        </span>
                                        <p>Original offer</p>
                                    </div>
                                    <p class="Price1">$100</p>
                                </div>
                                <div class="BlockData2">
                                    <div class="BlockDataInner2">
                                        <span>
                                            <img src="../assets/images/Icon5.png" alt="">
                                        </span>
                                        <p>Counter offer</p>
                                    </div>
                                    <p class="Price2">$150</p>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <label class="form-label">Enter final Offer</label>
                                    <input type="text" placeholder="Enter amount">
                                </div>
                                <button type="button" class="btn btn-primary">Send</button>
                            </div>
                            <div class="col-md-6 col-sm-12 BtnContainer w-50">
                                <button type="button" class="btn btn-primary">
                                    <span>
                                        <img src="../assets/images/Icon5.png" alt="">
                                    </span>
                                    <p>Accept counter offer</p>
                                </button>
                                <button type="button" class="btn btn-primary">
                                    <span>
                                        <img src="../assets/images/Icon2.png" alt="">
                                    </span>
                                    <p>Withdraw invitation</p>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Send Appearance Modal 3 -->
        <div class="modal fade CustomModal" id="AppearanceModal3" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pending</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body AppearanceData">
                        <form class="row">
                            <div class="col-md-12 col-sm-12 BtnContainer">
                                <button type="button" class="btn btn-primary">
                                    <span>
                                        <img src="../assets/images/Icon2.png" alt="">
                                    </span>
                                    <p>Withdraw invitation</p>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Send Appearance Modal 4 -->
        <div class="modal fade CustomModal" id="AppearanceModal4" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Rejected</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body AppearanceData">
                        <form class="row g-3">
                            <div class="col-md-12 col-sm-12 BtnContainer flex-row">
                                <button type="button" class="btn btn-primary">
                                    <span>
                                        <img src="../assets/images/Icon2.png" alt="">
                                    </span>
                                    <p>Clear from list</p>
                                </button>
                                <button type="button" class="btn btn-primary">
                                    <span>
                                        <img src="../assets/images/Icon2.png" alt="">
                                    </span>
                                    <p>Clear all</p>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row m-0 TabBar">
            <div class="Pagination">
                <a href="" id="Home"><i class="fa fa-angle-left" aria-hidden="true"></i> Home / Appearance
                    Management</a>
            </div>

            <div class="TabContainer">
                <div class="Tab active" onclick="openTab(event, 'AcceptedAppearance')">Accepted</div>
                <div class="Tab" onclick="openTab(event, 'SentAppearance')">Sent</div>
                <div class="Tab" onclick="openTab(event, 'CompletedAppearance')">Completed</div>
            </div>
        </div>

        <div id="AcceptedAppearance" class="row m-0 TabContent active">
            <div class="Card col-lg-3 col-md-3 col-sm-6">
                <div class="CardInner">
                    <div class="Cover"></div>
                    <p class="Heading">Name of Athlete</p>
                    <p class="SubHeading">Event Name (Event Category)</p>
                    <p class="SubHeading">Location: </p>
                    <p class="SubHeading">Date: </p>
                    <p class="SubHeading">Time: </p>
                    <p class="SubHeading">Price: </p>
                    <div class="IconContainer">
                        <a href="" data-bs-toggle="modal" data-bs-target="#AppearanceModal1">
                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div id="SentAppearance" class="row m-0 TabContent">
            <ul class="nav nav-tabs InnerTabContainer" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" data-bs-toggle="tab" href="#CounterOffer" role="tab"
                        aria-controls="CounterOffer" aria-selected="true">Counter Offer</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#Pending" role="tab" aria-controls="Pending"
                        aria-selected="false">Pending</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#Rejected" role="tab" aria-controls="Rejected"
                        aria-selected="false">Rejected</a>
                </li>
            </ul>
            <div class="tab-content InnerTabData" id="tab-content">
                <div class="tab-pane active" id="CounterOffer" role="tabpanel">
                    <div class="row">
                        <div class="Card col-lg-3 col-md-3 col-sm-6">
                            <div class="CardInner">
                                <div class="Cover"></div>
                                <p class="Heading">Name of Athlete</p>
                                <p class="SubHeading">Event Name (Event Category)</p>
                                <p class="SubHeading">Location: </p>
                                <p class="SubHeading">Date: </p>
                                <p class="SubHeading">Time: </p>
                                <p class="SubHeading">Price: </p>
                                <div class="IconContainer">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#AppearanceModal2">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="Card col-lg-3 col-md-3 col-sm-6">
                            <div class="CardInner">
                                <div class="Cover"></div>
                                <p class="Heading">Name of Athlete</p>
                                <p class="SubHeading">Event Name (Event Category)</p>
                                <p class="SubHeading">Location: </p>
                                <p class="SubHeading">Date: </p>
                                <p class="SubHeading">Time: </p>
                                <p class="SubHeading">Price: </p>
                                <div class="IconContainer">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#AppearanceModal2">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="Card col-lg-3 col-md-3 col-sm-6">
                            <div class="CardInner">
                                <div class="Cover"></div>
                                <p class="Heading">Name of Athlete</p>
                                <p class="SubHeading">Event Name (Event Category)</p>
                                <p class="SubHeading">Location: </p>
                                <p class="SubHeading">Date: </p>
                                <p class="SubHeading">Time: </p>
                                <p class="SubHeading">Price: </p>
                                <div class="IconContainer">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#AppearanceModal2">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="Card col-lg-3 col-md-3 col-sm-6">
                            <div class="CardInner">
                                <div class="Cover"></div>
                                <p class="Heading">Name of Athlete</p>
                                <p class="SubHeading">Event Name (Event Category)</p>
                                <p class="SubHeading">Location: </p>
                                <p class="SubHeading">Date: </p>
                                <p class="SubHeading">Time: </p>
                                <p class="SubHeading">Price: </p>
                                <div class="IconContainer">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#AppearanceModal2">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="Card col-lg-3 col-md-3 col-sm-6">
                            <div class="CardInner">
                                <div class="Cover"></div>
                                <p class="Heading">Name of Athlete</p>
                                <p class="SubHeading">Event Name (Event Category)</p>
                                <p class="SubHeading">Location: </p>
                                <p class="SubHeading">Date: </p>
                                <p class="SubHeading">Time: </p>
                                <p class="SubHeading">Price: </p>
                                <div class="IconContainer">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#AppearanceModal2">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="Pending" role="tabpanel">
                    <div class="row">
                        <div class="Card col-lg-3 col-md-3 col-sm-6">
                            <div class="CardInner">
                                <div class="Cover"></div>
                                <p class="Heading">Name of Athlete</p>
                                <p class="SubHeading">Event Name (Event Category)</p>
                                <p class="SubHeading">Location: </p>
                                <p class="SubHeading">Date: </p>
                                <p class="SubHeading">Time: </p>
                                <p class="SubHeading">Price: </p>
                                <div class="IconContainer">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#AppearanceModal3">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="Rejected" role="tabpanel">
                    <div class="row">
                        <div class="Card col-lg-3 col-md-3 col-sm-6">
                            <div class="CardInner">
                                <div class="Cover"></div>
                                <p class="Heading">Name of Athlete</p>
                                <p class="SubHeading">Event Name (Event Category)</p>
                                <p class="SubHeading">Location: </p>
                                <p class="SubHeading">Date: </p>
                                <p class="SubHeading">Time: </p>
                                <p class="SubHeading">Price: </p>
                                <div class="IconContainer">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#AppearanceModal4">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="CompletedAppearance" class="row m-0 TabContent">
            <div class="Card col-lg-3 col-md-3 col-sm-6">
                <div class="CardInner">
                    <div class="Cover"></div>
                    <p class="Heading">Name of Athlete</p>
                    <p class="SubHeading">Event Name (Event Category)</p>
                    <p class="SubHeading">Location: </p>
                    <p class="SubHeading">Date: </p>
                    <p class="SubHeading">Time: </p>
                    <p class="SubHeading">Price: </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid m-0 Section Event" style="display: none;">
        <!-- Add Event Button -->
        <button type="button" class="AddButton" data-bs-toggle="modal" data-bs-target="#AddEventModal">
            <i class="fa fa-plus" aria-hidden="true"></i>
            <p>Add Event</p>
        </button>

        <!-- Add Event Modal -->
        <div class="modal fade CustomModal" id="AddEventModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3">
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Event Name *</label>
                                <input type="text" placeholder="Enter event name">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Location *</label>
                                <input type="text" placeholder="Enter location">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Tags</label>
                                <input type="text" placeholder="#Tags">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Date *</label>
                                <input type="date" placeholder="Date">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Time *</label>
                                <input type="time" placeholder="Time">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <label class="form-label">Description</label>
                                <textarea type="text" placeholder="Description"></textarea>
                            </div>
                            <div class="row m-0 pt-3">
                                <div class="row m-0 InnerData g-3" style="padding: 10px;">
                                    <div class="col-md-4 col-sm-12 m-0">
                                        <label class="form-label">Category *</label>
                                        <select>
                                            <option selected disabled value="">Choose a category</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div
                                        class="col-md-4 col-sm-12 m-0 d-flex align-items-center justify-content-center">
                                        <p class="ORText">OR</p>
                                    </div>
                                    <div class="col-md-4 col-sm-12 m-0">
                                        <label class="form-label">Add Category *</label>
                                        <input type="text" placeholder="Add a category">
                                    </div>
                                </div>
                            </div>
                            <div class="row m-0 pt-4 pb-2">
                                <div class="row m-0 InnerData g-3">
                                    <p class="Heading">Event Information</p>
                                    <div class="col-md-4 col-sm-12">
                                        <label class="form-label">Phone *</label>
                                        <input type="text" placeholder="Enter phone number">
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label class="form-label">Email *</label>
                                        <input type="text" placeholder="Enter email address">
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label class="form-label">Website</label>
                                        <input type="text" placeholder="Enter website URL">
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label class="form-label">Upload Images</label>
                                        <input type="file" class="form-control" id="inputGroupFile01">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Event Modal -->
        <div class="modal fade CustomModal" id="EditEventModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3">
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Event Name *</label>
                                <input type="text" placeholder="Enter event name">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Location *</label>
                                <input type="text" placeholder="Enter location">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Tags</label>
                                <input type="text" placeholder="#Tags">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Date *</label>
                                <input type="date" placeholder="Date">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Time *</label>
                                <input type="time" placeholder="Time">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <label class="form-label">Description</label>
                                <textarea type="text" placeholder="Description"></textarea>
                            </div>
                            <div class="row m-0 pt-3">
                                <div class="row m-0 InnerData g-3" style="padding: 10px;">
                                    <div class="col-md-4 col-sm-12 m-0">
                                        <label class="form-label">Category *</label>
                                        <select>
                                            <option selected disabled value="">Choose a category</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div
                                        class="col-md-4 col-sm-12 m-0 d-flex align-items-center justify-content-center">
                                        <p class="ORText">OR</p>
                                    </div>
                                    <div class="col-md-4 col-sm-12 m-0">
                                        <label class="form-label">Add Category *</label>
                                        <input type="text" placeholder="Add a category">
                                    </div>
                                </div>
                            </div>
                            <div class="row m-0 pt-4 pb-2">
                                <div class="row m-0 InnerData g-3">
                                    <p class="Heading">Event Information</p>
                                    <div class="col-md-4 col-sm-12">
                                        <label class="form-label">Phone *</label>
                                        <input type="text" placeholder="Enter phone number">
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label class="form-label">Email *</label>
                                        <input type="text" placeholder="Enter email address">
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label class="form-label">Website</label>
                                        <input type="text" placeholder="Enter website URL">
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label class="form-label">Upload Images</label>
                                        <input type="file" class="form-control" id="inputGroupFile01">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Event Modal -->
        <div class="modal fade CustomModal" id="DeleteEventModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="InfoText">Do you really want your event to be deleted? It cannot be undone once
                            deleted.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Details My Event Modal -->
        <div class="modal fade CustomModal" id="DetailsMyEventModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Event Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row PromotionDetail">
                            <div class="col-md-8 col-sm-12 PromotionImg">
                                <img class="w-100"
                                    src="https://img.freepik.com/free-photo/people-concert_1160-737.jpg?t=st=1730050734~exp=1730054334~hmac=4785251%E2%80%A6&w=900"
                                    alt="">
                            </div>
                            <div class="col-md-4 col-sm-12 PromotionData">
                                <img class="OwnerImg"
                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&amp;w=1887&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    alt="">
                                <p class="TitleText">Event Name</p>
                                <p class="OwnerText">Event Organizer Name</p>
                                <p class="OwnerText"><b>Location:</b></p>
                                <p class="OwnerText"><b>Date:</b></p>
                                <p class="OwnerText"><b>Time:</b></p>
                                <ul>
                                    <li>Tag Item</li>
                                    <li>Tag Item</li>
                                    <li>Tag</li>
                                    <li>Tag Item</li>
                                    <li>Tag Item</li>
                                </ul>
                                <div class="PeopleContainer">
                                    <div class="TopSection">
                                        <p>Invited People</p>
                                        <div class="d-flex flex-row gap-3">
                                            <a href="" data-bs-toggle="modal" data-bs-target="#EventInvitedModal">
                                                <img src="../assets/images/Icon7.png" alt="">
                                            </a>
                                            <a href="" data-bs-toggle="modal" data-bs-target="#EventInvitedModal">
                                                <img src="../assets/images/Icon6.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="PhotoSection">
                                        <img src="https://images.unsplash.com/photo-1541271696563-3be2f555fc4e?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/pleasant-looking-teenage-girl-wears-comfortable-hoodie-had-combed-dark-hair-looks-camera-with-little-smile_273609-38963.jpg?t=st=1731403649~exp=1731407249~hmac=963e1e2f465e3a549ade5f6d2b1a1c76cd808d814e09a26492d113f093c98df9&w=1380"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/happy-ethnic-teenager-with-afro-hair-smiles-positively-wears-purple-hoodie-being-good-mood_273609-46758.jpg?t=st=1731403690~exp=1731407290~hmac=897578c7d33f1e3ec028b597051e6fd4d50f34983a8216b006cbe6470479bcc6&w=1380"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/view-female-soccer-player_23-2150888397.jpg?t=st=1731403756~exp=1731407356~hmac=4056b8a1fc9e97b53ad916d89700567781e74de02d93a20828a84245bcc2b240&w=1380"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/close-up-woman-portrait-new-york_23-2150868218.jpg?t=st=1731403874~exp=1731407474~hmac=4b89bc31aa4d76a4a7861e2904825b05b0c42a47cccfa13bfe5ea4be52198ecf&w=1380"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/international-day-education-celebration_23-2150931022.jpg?t=st=1731403870~exp=1731407470~hmac=286b5917d5d08c0f5291a305bf2ea8abda079436000dcaa1fdb7b536cb1bbf2c&w=826"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/portrait-elegant-professional-businesswoman_23-2150917246.jpg?t=st=1731403456~exp=1731407056~hmac=709ab44fb2fe8a9c29b06e38c60ffa2dade979f272ab9821233ddfc73a4481a0&w=826"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/confident-young-businesswoman-smiling-looking-camera-indoors-generated-by-artificial-intelligence_188544-125559.jpg?t=st=1731403789~exp=1731407389~hmac=63d2f919b22ce1bc0a1ebbf081b67b0120c62ddc96a22e20802a9dcb22ec9f5d&w=1380"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/female-freelancer-portrait_1409-7005.jpg?t=st=1731403923~exp=1731407523~hmac=cac4092395d9d3bed18406c8be637fd00d88f7cccb769cf62cc6ea24c68bcc3b&w=1380"
                                            alt="">
                                        <span class="PhotoCount">
                                            <p>+5</p>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 PromotionData">
                                <p class="BodyText">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod
                                    molestias nihil vero
                                    quisquam
                                    assumenda. Consequuntur fuga veritatis quasi voluptates eum soluta ea quos eaque,
                                    hic possimus
                                    ipsum? Dicta, quisquam natus. Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Cumque iusto
                                    autem rerum quibusdam pariatur saepe earum, laboriosam quam ab illo quod ad ut
                                    voluptatem.
                                    Consectetur, unde. Odit, beatae? Fugiat, magni. Lorem ipsum dolor sit, amet
                                    consectetur adipisicing
                                    elit. Nemo tempora delectus, officiis corrupti perspiciatis quam temporibus!
                                    Placeat, consectetur
                                    possimus ab accusantium itaque numquam ea. Dicta deserunt quae blanditiis eaque
                                    fuga. Lorem ipsum
                                    dolor sit amet, consectetur adipisicing elit. Voluptates perferendis illum earum
                                    tempore, voluptas,
                                    facilis ullam illo sed provident tenetur quod accusantium harum, numquam nam
                                    consectetur aut
                                    consequuntur sunt quaerat? Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Eaque aperiam
                                    in similique quibusdam, ex veniam. Ullam, minus! Sapiente suscipit pariatur eum
                                    aspernatur
                                    laudantium earum! Quaerat, molestias ullam! Dolorum, sit similique. Lorem ipsum
                                    dolor sit amet,
                                    consectetur adipisicing elit. Exercitationem odio iure corporis deleniti unde quo ab
                                    atque soluta
                                    quam porro commodi quae ut natus, in voluptates quia quod fugit sint.</p>
                            </div>
                            <div class="col-md-12 col-sm-12 PeopleContainer mt-2">
                                <div class="TopSection">
                                    <p>Photos</p>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#EventPhotosModal">
                                        <img src="../assets/images/Icon6.png" alt="">
                                    </a>
                                </div>
                                <div class="EventPhotoContainer">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#EventPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/blue-holi-color-explosion-young-woman-dancing_23-2148129343.jpg?t=st=1731406746~exp=1731410346~hmac=aac3004aa5f9db23dd6c266f0c5351a065f18d551f3da09872c50dc1851d2c1f&w=1380"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#EventPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/close-up-people-dancing-yellow-explosion-holi-color_23-2148129155.jpg?t=st=1731406654~exp=1731410254~hmac=e14e090ddbf68f2d9247a7ccfa46a4342c248a318fa4268954954fcbed03faea&w=740"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#EventPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/green-holi-color-powder-crowd_23-2148129312.jpg?t=st=1731406659~exp=1731410259~hmac=bbd9797f2b5a6ab957dc738298432651e61989de3a9a3dac15534dc439224e36&w=1380"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#EventPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/group-people-enjoying-holi-color_23-2148129319.jpg?t=st=1731406297~exp=1731409897~hmac=acd19fe86608034c5d2c2cddd5ba441729d9c046cfd629ff77eec2bc60c8b980&w=1380"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#EventPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/black-man-surrounded-by-orange-smoke_410324-20.jpg?t=st=1731406716~exp=1731410316~hmac=793484971ee67895250accc8aa03bf8873cdb16f98f451ed9751c18de6dee65d&w=740"
                                            alt="">
                                    </a>
                                    <a href="" class="BlurrCover" data-bs-toggle="modal"
                                        data-bs-target="#EventPhotosModal">
                                        <div class="BlurrCoverData">
                                            <p>+ 10</p>
                                        </div>
                                        <img src="https://img.freepik.com/free-photo/green-blue-holi-color-powder-crowd_23-2148129315.jpg?t=st=1731407223~exp=1731410823~hmac=38dd34eb6b370798b180a31014e9d25d2e438d6d5b09c4b82e79e3d79448f403&w=1380"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Details Fav Event Modal -->
        <div class="modal fade CustomModal" id="FavEventModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Event Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row PromotionDetail">
                            <div class="col-md-8 col-sm-12 PromotionImg position-relative">
                                <div class="IconContainer" data-bs-toggle="modal" data-bs-target="#EventMoreModal">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#AppearanceModal1">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <img class="w-100"
                                    src="https://img.freepik.com/free-photo/people-concert_1160-737.jpg?t=st=1730050734~exp=1730054334~hmac=4785251%E2%80%A6&w=900"
                                    alt="">
                            </div>
                            <div class="col-md-4 col-sm-12 PromotionData">
                                <img class="OwnerImg"
                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&amp;w=1887&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    alt="">
                                <p class="TitleText">Event Name</p>
                                <p class="OwnerText">Event Organizer Name</p>
                                <p class="OwnerText"><b>Location:</b></p>
                                <p class="OwnerText"><b>Date:</b></p>
                                <p class="OwnerText"><b>Time:</b></p>
                                <ul>
                                    <li>Tag Item</li>
                                    <li>Tag Item</li>
                                    <li>Tag</li>
                                    <li>Tag Item</li>
                                    <li>Tag Item</li>
                                </ul>
                                <div class="PeopleContainer">
                                    <div class="TopSection">
                                        <p>Invited People</p>
                                        <div class="d-flex flex-row gap-3">
                                            <a href="" data-bs-toggle="modal" data-bs-target="#EventInvitePeopleModal">
                                                <img src="../assets/images/Icon6.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="PhotoSection">
                                        <img src="https://images.unsplash.com/photo-1541271696563-3be2f555fc4e?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/pleasant-looking-teenage-girl-wears-comfortable-hoodie-had-combed-dark-hair-looks-camera-with-little-smile_273609-38963.jpg?t=st=1731403649~exp=1731407249~hmac=963e1e2f465e3a549ade5f6d2b1a1c76cd808d814e09a26492d113f093c98df9&w=1380"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/happy-ethnic-teenager-with-afro-hair-smiles-positively-wears-purple-hoodie-being-good-mood_273609-46758.jpg?t=st=1731403690~exp=1731407290~hmac=897578c7d33f1e3ec028b597051e6fd4d50f34983a8216b006cbe6470479bcc6&w=1380"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/view-female-soccer-player_23-2150888397.jpg?t=st=1731403756~exp=1731407356~hmac=4056b8a1fc9e97b53ad916d89700567781e74de02d93a20828a84245bcc2b240&w=1380"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/close-up-woman-portrait-new-york_23-2150868218.jpg?t=st=1731403874~exp=1731407474~hmac=4b89bc31aa4d76a4a7861e2904825b05b0c42a47cccfa13bfe5ea4be52198ecf&w=1380"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/international-day-education-celebration_23-2150931022.jpg?t=st=1731403870~exp=1731407470~hmac=286b5917d5d08c0f5291a305bf2ea8abda079436000dcaa1fdb7b536cb1bbf2c&w=826"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/portrait-elegant-professional-businesswoman_23-2150917246.jpg?t=st=1731403456~exp=1731407056~hmac=709ab44fb2fe8a9c29b06e38c60ffa2dade979f272ab9821233ddfc73a4481a0&w=826"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/confident-young-businesswoman-smiling-looking-camera-indoors-generated-by-artificial-intelligence_188544-125559.jpg?t=st=1731403789~exp=1731407389~hmac=63d2f919b22ce1bc0a1ebbf081b67b0120c62ddc96a22e20802a9dcb22ec9f5d&w=1380"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/female-freelancer-portrait_1409-7005.jpg?t=st=1731403923~exp=1731407523~hmac=cac4092395d9d3bed18406c8be637fd00d88f7cccb769cf62cc6ea24c68bcc3b&w=1380"
                                            alt="">
                                        <span class="PhotoCount">
                                            <p>+5</p>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 PromotionData">
                                <p class="BodyText">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod
                                    molestias nihil vero
                                    quisquam
                                    assumenda. Consequuntur fuga veritatis quasi voluptates eum soluta ea quos eaque,
                                    hic possimus
                                    ipsum? Dicta, quisquam natus. Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Cumque iusto
                                    autem rerum quibusdam pariatur saepe earum, laboriosam quam ab illo quod ad ut
                                    voluptatem.
                                    Consectetur, unde. Odit, beatae? Fugiat, magni. Lorem ipsum dolor sit, amet
                                    consectetur adipisicing
                                    elit. Nemo tempora delectus, officiis corrupti perspiciatis quam temporibus!
                                    Placeat, consectetur
                                    possimus ab accusantium itaque numquam ea. Dicta deserunt quae blanditiis eaque
                                    fuga. Lorem ipsum
                                    dolor sit amet, consectetur adipisicing elit. Voluptates perferendis illum earum
                                    tempore, voluptas,
                                    facilis ullam illo sed provident tenetur quod accusantium harum, numquam nam
                                    consectetur aut
                                    consequuntur sunt quaerat? Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Eaque aperiam
                                    in similique quibusdam, ex veniam. Ullam, minus! Sapiente suscipit pariatur eum
                                    aspernatur
                                    laudantium earum! Quaerat, molestias ullam! Dolorum, sit similique. Lorem ipsum
                                    dolor sit amet,
                                    consectetur adipisicing elit. Exercitationem odio iure corporis deleniti unde quo ab
                                    atque soluta
                                    quam porro commodi quae ut natus, in voluptates quia quod fugit sint.</p>
                            </div>
                            <div class="col-md-12 col-sm-12 PeopleContainer mt-2">
                                <div class="TopSection">
                                    <p>Photos</p>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#EventPhotosModal">
                                        <img src="../assets/images/Icon6.png" alt="">
                                    </a>
                                </div>
                                <div class="EventPhotoContainer">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#EventPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/blue-holi-color-explosion-young-woman-dancing_23-2148129343.jpg?t=st=1731406746~exp=1731410346~hmac=aac3004aa5f9db23dd6c266f0c5351a065f18d551f3da09872c50dc1851d2c1f&w=1380"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#EventPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/close-up-people-dancing-yellow-explosion-holi-color_23-2148129155.jpg?t=st=1731406654~exp=1731410254~hmac=e14e090ddbf68f2d9247a7ccfa46a4342c248a318fa4268954954fcbed03faea&w=740"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#EventPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/green-holi-color-powder-crowd_23-2148129312.jpg?t=st=1731406659~exp=1731410259~hmac=bbd9797f2b5a6ab957dc738298432651e61989de3a9a3dac15534dc439224e36&w=1380"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#EventPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/group-people-enjoying-holi-color_23-2148129319.jpg?t=st=1731406297~exp=1731409897~hmac=acd19fe86608034c5d2c2cddd5ba441729d9c046cfd629ff77eec2bc60c8b980&w=1380"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#EventPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/black-man-surrounded-by-orange-smoke_410324-20.jpg?t=st=1731406716~exp=1731410316~hmac=793484971ee67895250accc8aa03bf8873cdb16f98f451ed9751c18de6dee65d&w=740"
                                            alt="">
                                    </a>
                                    <a href="" class="BlurrCover" data-bs-toggle="modal"
                                        data-bs-target="#EventPhotosModal">
                                        <div class="BlurrCoverData">
                                            <p>+ 10</p>
                                        </div>
                                        <img src="https://img.freepik.com/free-photo/green-blue-holi-color-powder-crowd_23-2148129315.jpg?t=st=1731407223~exp=1731410823~hmac=38dd34eb6b370798b180a31014e9d25d2e438d6d5b09c4b82e79e3d79448f403&w=1380"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Event More Modal -->
        <div class="modal fade CustomModal" id="EventMoreModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Event Option</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body AppearanceData">
                        <form class="row g-3">
                            <div class="col-md-12 col-sm-12 BtnContainer flex-row">
                                <button type="button" class="btn btn-primary">
                                    <span>
                                        <img src="../assets/images/Icon21.png" alt="">
                                    </span>
                                    <p>Request to join the event</p>
                                </button>
                                <button type="button" class="btn btn-primary">
                                    <span>
                                        <img src="../assets/images/Icon22.png" alt="">
                                    </span>
                                    <p>Show Interest</p>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Event Photos Modal -->
        <div class="modal fade CustomModal" id="EventPhotosModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Photos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row PromotionDetail">
                            <div class="col-md-12 col-sm-12 PromotionImg">
                                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img style="height: 75vh;"
                                                src="https://img.freepik.com/free-photo/blue-holi-color-explosion-young-woman-dancing_23-2148129343.jpg?t=st=1731406746~exp=1731410346~hmac=aac3004aa5f9db23dd6c266f0c5351a065f18d551f3da09872c50dc1851d2c1f&w=1380"
                                                class="d-block w-100" alt="">
                                        </div>
                                        <div class="carousel-item">
                                            <img style="height: 75vh;"
                                                src="https://img.freepik.com/free-photo/close-up-people-dancing-yellow-explosion-holi-color_23-2148129155.jpg?t=st=1731406654~exp=1731410254~hmac=e14e090ddbf68f2d9247a7ccfa46a4342c248a318fa4268954954fcbed03faea&w=740"
                                                class="d-block w-100" alt="">
                                        </div>
                                        <div class="carousel-item">
                                            <img style="height: 75vh;"
                                                src="https://img.freepik.com/free-photo/green-holi-color-powder-crowd_23-2148129312.jpg?t=st=1731406659~exp=1731410259~hmac=bbd9797f2b5a6ab957dc738298432651e61989de3a9a3dac15534dc439224e36&w=1380"
                                                class="d-block w-100" alt="">
                                        </div>
                                        <div class="carousel-item">
                                            <img style="height: 75vh;"
                                                src="https://img.freepik.com/free-photo/group-people-enjoying-holi-color_23-2148129319.jpg?t=st=1731406297~exp=1731409897~hmac=acd19fe86608034c5d2c2cddd5ba441729d9c046cfd629ff77eec2bc60c8b980&w=1380"
                                                class="d-block w-100" alt="">
                                        </div>
                                        <div class="carousel-item">
                                            <img style="height: 75vh;"
                                                src="https://img.freepik.com/free-photo/black-man-surrounded-by-orange-smoke_410324-20.jpg?t=st=1731406716~exp=1731410316~hmac=793484971ee67895250accc8aa03bf8873cdb16f98f451ed9751c18de6dee65d&w=740"
                                                class="d-block w-100" alt="">
                                        </div>
                                        <div class="carousel-item">
                                            <img style="height: 75vh;"
                                                src="https://img.freepik.com/free-photo/green-blue-holi-color-powder-crowd_23-2148129315.jpg?t=st=1731407223~exp=1731410823~hmac=38dd34eb6b370798b180a31014e9d25d2e438d6d5b09c4b82e79e3d79448f403&w=1380"
                                                class="d-block w-100" alt="">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Event Invited Modal -->
        <div class="modal fade CustomModal" id="EventInvitedModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Invitations</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row m-0 InvitedPeopleTab">
                            <div class="col-md-12 col-sm-12">
                                <!-- Tabs Navigation -->
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="All-Tab" data-bs-toggle="tab"
                                            data-bs-target="#AllTab" type="button" role="tab" aria-controls="AllTab"
                                            aria-selected="true">All</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="InvitedPeople-Tab" data-bs-toggle="tab"
                                            data-bs-target="#InvitedPeopleTab" type="button" role="tab"
                                            aria-controls="profile" aria-selected="false">Invited People</button>
                                    </li>
                                </ul>

                                <input class="form-control mt-4 mb-4 SearchBarInner" type="search" placeholder="Search"
                                    aria-label="Search">

                                <!-- Tabs Content -->
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="AllTab" role="tabpanel"
                                        aria-labelledby="All-Tab">
                                        <div class="row m-0 AllContain">
                                            <div class="col-lg-4 col-md-4 ps-0 mb-4">
                                                <div class="AllContainBlock">
                                                    <div class="Data">
                                                        <img src="https://img.freepik.com/free-photo/lifestyle-people-emotions-casual-concept-confident-nice-smiling-asian-woman-cross-arms-chest-confident-ready-help-listening-coworkers-taking-part-conversation_1258-59335.jpg?t=st=1732007716~exp=1732011316~hmac=527a23b0f4c953638aee7ed04c9d6e999ac4850c1076314be0e59f980fb455ed&w=1380"
                                                            alt="">
                                                        <p>User Name</p>
                                                    </div>
                                                    <a href="">
                                                        <img src="../assets/images/Icon7.png" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <div class="AllContainBlock">
                                                    <div class="Data">
                                                        <img src="https://img.freepik.com/free-photo/lifestyle-people-emotions-casual-concept-confident-nice-smiling-asian-woman-cross-arms-chest-confident-ready-help-listening-coworkers-taking-part-conversation_1258-59335.jpg?t=st=1732007716~exp=1732011316~hmac=527a23b0f4c953638aee7ed04c9d6e999ac4850c1076314be0e59f980fb455ed&w=1380"
                                                            alt="">
                                                        <p>User Name</p>
                                                    </div>
                                                    <a href="">
                                                        <img src="../assets/images/Icon7.png" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <div class="AllContainBlock">
                                                    <div class="Data">
                                                        <img src="https://img.freepik.com/free-photo/lifestyle-people-emotions-casual-concept-confident-nice-smiling-asian-woman-cross-arms-chest-confident-ready-help-listening-coworkers-taking-part-conversation_1258-59335.jpg?t=st=1732007716~exp=1732011316~hmac=527a23b0f4c953638aee7ed04c9d6e999ac4850c1076314be0e59f980fb455ed&w=1380"
                                                            alt="">
                                                        <p>User Name</p>
                                                    </div>
                                                    <a href="">
                                                        <img src="../assets/images/Icon7.png" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 ps-0">
                                                <div class="AllContainBlock">
                                                    <div class="Data">
                                                        <img src="https://img.freepik.com/free-photo/lifestyle-people-emotions-casual-concept-confident-nice-smiling-asian-woman-cross-arms-chest-confident-ready-help-listening-coworkers-taking-part-conversation_1258-59335.jpg?t=st=1732007716~exp=1732011316~hmac=527a23b0f4c953638aee7ed04c9d6e999ac4850c1076314be0e59f980fb455ed&w=1380"
                                                            alt="">
                                                        <p>User Name</p>
                                                    </div>
                                                    <a href="">
                                                        <img src="../assets/images/Icon7.png" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="InvitedPeopleTab" role="tabpanel"
                                        aria-labelledby="InvitedPeople-Tab">
                                        <div class="row m-0 InvitedContain">
                                            <div class="col-lg-4 col-md-4 ps-0">
                                                <div class="InvitedContainBlock">
                                                    <div class="Data">
                                                        <img src="https://img.freepik.com/free-photo/lifestyle-people-emotions-casual-concept-confident-nice-smiling-asian-woman-cross-arms-chest-confident-ready-help-listening-coworkers-taking-part-conversation_1258-59335.jpg?t=st=1732007716~exp=1732011316~hmac=527a23b0f4c953638aee7ed04c9d6e999ac4850c1076314be0e59f980fb455ed&w=1380"
                                                            alt="">
                                                        <p>User Name</p>
                                                    </div>
                                                    <a href="">
                                                        Invited
                                                    </a>
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

        <!-- Event Invite People Modal -->
        <div class="modal fade CustomModal" id="EventInvitePeopleModal" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Invitations</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input class="form-control mb-4 SearchBarInner" type="search" placeholder="Search"
                            aria-label="Search">

                        <div class="row m-0 InvitedContain">
                            <div class="col-lg-4 col-md-4 ps-0 mb-4">
                                <div class="InvitedContainBlock">
                                    <div class="Data">
                                        <img src="https://img.freepik.com/free-photo/lifestyle-people-emotions-casual-concept-confident-nice-smiling-asian-woman-cross-arms-chest-confident-ready-help-listening-coworkers-taking-part-conversation_1258-59335.jpg?t=st=1732007716~exp=1732011316~hmac=527a23b0f4c953638aee7ed04c9d6e999ac4850c1076314be0e59f980fb455ed&w=1380"
                                            alt="">
                                        <p>User Name</p>
                                    </div>
                                    <a href="">
                                        Invited
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 mb-4">
                                <div class="InvitedContainBlock">
                                    <div class="Data">
                                        <img src="https://img.freepik.com/free-photo/lifestyle-people-emotions-casual-concept-confident-nice-smiling-asian-woman-cross-arms-chest-confident-ready-help-listening-coworkers-taking-part-conversation_1258-59335.jpg?t=st=1732007716~exp=1732011316~hmac=527a23b0f4c953638aee7ed04c9d6e999ac4850c1076314be0e59f980fb455ed&w=1380"
                                            alt="">
                                        <p>User Name</p>
                                    </div>
                                    <a href="">
                                        Invited
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 pe-0 mb-4">
                                <div class="InvitedContainBlock">
                                    <div class="Data">
                                        <img src="https://img.freepik.com/free-photo/lifestyle-people-emotions-casual-concept-confident-nice-smiling-asian-woman-cross-arms-chest-confident-ready-help-listening-coworkers-taking-part-conversation_1258-59335.jpg?t=st=1732007716~exp=1732011316~hmac=527a23b0f4c953638aee7ed04c9d6e999ac4850c1076314be0e59f980fb455ed&w=1380"
                                            alt="">
                                        <p>User Name</p>
                                    </div>
                                    <a href="">
                                        Invited
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 ps-0">
                                <div class="InvitedContainBlock">
                                    <div class="Data">
                                        <img src="https://img.freepik.com/free-photo/lifestyle-people-emotions-casual-concept-confident-nice-smiling-asian-woman-cross-arms-chest-confident-ready-help-listening-coworkers-taking-part-conversation_1258-59335.jpg?t=st=1732007716~exp=1732011316~hmac=527a23b0f4c953638aee7ed04c9d6e999ac4850c1076314be0e59f980fb455ed&w=1380"
                                            alt="">
                                        <p>User Name</p>
                                    </div>
                                    <a href="">
                                        Invited
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="InvitedContainBlock">
                                    <div class="Data">
                                        <img src="https://img.freepik.com/free-photo/lifestyle-people-emotions-casual-concept-confident-nice-smiling-asian-woman-cross-arms-chest-confident-ready-help-listening-coworkers-taking-part-conversation_1258-59335.jpg?t=st=1732007716~exp=1732011316~hmac=527a23b0f4c953638aee7ed04c9d6e999ac4850c1076314be0e59f980fb455ed&w=1380"
                                            alt="">
                                        <p>User Name</p>
                                    </div>
                                    <a href="">
                                        Invited
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row m-0 TabBar">
            <div class="Pagination">
                <a href="" id="Home"><i class="fa fa-angle-left" aria-hidden="true"></i> Home / Event Management</a>
            </div>

            <div class="TabContainer">
                <div class="Tab active" onclick="openTab(event, 'MyEvents')">My Events</div>
                <div class="Tab" onclick="openTab(event, 'FavoriteEvents')">Favorite Events</div>
            </div>
        </div>

        <div id="MyEvents" class="row m-0 TabContent active">
            <div class="Card col-lg-3 col-md-3 col-sm-6" data-bs-toggle="modal" data-bs-target="#DetailsMyEventModal">
                <div class="CardInner">
                    <div class="Cover"></div>
                    <img class="UserImage"
                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="">
                    <p class="Heading">Event Name</p>
                    <p class="SubHeading">Event Organizer Name</p>
                    <p class="SubHeading">Location: </p>
                    <p class="SubHeading">Date: </p>
                    <p class="SubHeading">Time: </p>
                    <div class="IconContainer">
                        <a href="">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                        </a>
                        <a href="" data-bs-toggle="modal" data-bs-target="#EditEventModal">
                            <i class="fa fa-pencil-square" aria-hidden="true"></i>
                        </a>
                        <a href="" data-bs-toggle="modal" data-bs-target="#DeleteEventModal">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div id="FavoriteEvents" class="row m-0 TabContent">
            <div class="Card col-lg-3 col-md-3 col-sm-6" data-bs-toggle="modal" data-bs-target="#FavEventModal">
                <div class="CardInner">
                    <div class="Cover"></div>
                    <img class="UserImage"
                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="">
                    <p class="Heading">Event Name</p>
                    <p class="SubHeading">Event Organizer Name</p>
                    <p class="SubHeading">Location: </p>
                    <p class="SubHeading">Date: </p>
                    <p class="SubHeading">Time: </p>
                    <div class="IconContainer">
                        <a href="">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid m-0 Section Business" style="display: none;">
        <!-- Add Business Button -->
        <button type="button" class="AddButton" data-bs-toggle="modal" data-bs-target="#AddBusinessModal">
            <i class="fa fa-plus" aria-hidden="true"></i>
            <p>Add Business</p>
        </button>

        <!-- Add Business Modal -->
        <div class="modal fade CustomModal" id="AddBusinessModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Business</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3 AddBusinessData">
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Business Name *</label>
                                <input type="text" placeholder="Enter business name">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Name</label>
                                <input type="text" placeholder="Enter your name">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Location *</label>
                                <input type="text" placeholder="Enter location">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Category *</label>
                                <select>
                                    <option selected disabled value="">Choose a category</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Tags</label>
                                <input type="text" placeholder="#Tag">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <label class="form-label">Description</label>
                                <textarea type="text" placeholder="Description"></textarea>
                            </div>
                            <div class="row m-0 pt-4 pb-2">
                                <div class="row m-0 InnerData g-3">
                                    <p class="Heading">Business Information</p>
                                    <div class="col-md-4 col-sm-12">
                                        <label class="form-label">Phone *</label>
                                        <input type="text" placeholder="Enter phone number">
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label class="form-label">Email *</label>
                                        <input type="text" placeholder="Enter email address">
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label class="form-label">Website</label>
                                        <input type="text" placeholder="Enter website URL">
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label class="form-label">Upload Images</label>
                                        <input type="file" class="form-control" id="inputGroupFile01">
                                    </div>
                                </div>
                            </div>
                        </form>

                        <form class="row g-3 AddCategoryData">
                            <div class="col-md-4 col-sm-12">
                                <div class="col-md-12 col-sm-12">
                                    <label class="form-label">Category</label>
                                    <input type="text" placeholder="Enter category name">
                                </div>
                                <div class="col-md-12 col-sm-12 mt-3">
                                    <a href="" class="AddBtn">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        <p class="m-0">Add Category</p>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-8 col-sm-12">
                                <div class="row m-0">
                                    <label class="form-label">Category Name List</label>
                                    <div class="col-md-6 col-sm-12 position-relative">
                                        <p class="CategoryNameList">Category Name</p>
                                        <a href="" class="CategoryDeleteBtn">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-6 col-sm-12 position-relative">
                                        <p class="CategoryNameList">Category Name</p>
                                        <a href="" class="CategoryDeleteBtn">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-6 col-sm-12 position-relative">
                                        <p class="CategoryNameList">Category Name</p>
                                        <a href="" class="CategoryDeleteBtn">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <form class="row g-3 AddProduct">
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Choose Category *</label>
                                <select>
                                    <option selected disabled value="">Choose a category</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Product Name *</label>
                                <input type="text" placeholder="Enter product name">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Price *</label>
                                <input type="text" placeholder="Enter price">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Tags *</label>
                                <input type="text" placeholder="#Tags">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Upload Images</label>
                                <input type="file" class="form-control" id="inputGroupFile01">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <label class="form-label">Description</label>
                                <textarea type="text" placeholder="Description"></textarea>
                            </div>
                        </form>

                        <form class="row g-3 AddService">
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Choose Category *</label>
                                <select>
                                    <option selected disabled value="">Choose a category</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Service Name *</label>
                                <input type="text" placeholder="Enter service name">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Price *</label>
                                <input type="text" placeholder="Enter price">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Tags *</label>
                                <input type="text" placeholder="#Tags">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Upload Images</label>
                                <input type="file" class="form-control" id="inputGroupFile01">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <label class="form-label">Description</label>
                                <textarea type="text" placeholder="Description"></textarea>
                            </div>
                        </form>

                        <form class="row g-3 AddProductData">
                            <div class="col-lg-12 col-md-12 ProductService"
                                style="border-bottom: 1.5px solid #ddd; border-style: dashed; border-top: 0; border-left: 0; border-right: 0;">
                                <div class="DataBlock">
                                    <img src="../assets/images/Icon23.png" alt="">
                                    <p class="m-0">Here, include your products</p>
                                </div>

                                <!-- Product Container -->
                                <div class="ProductContainer d-none">
                                    <div class="ProductBlock">
                                        <a href="" class="RemoveIcon">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                        <img src="../assets/images/ImageBack1.jpg" alt="">
                                        <div class="ProductTextBlock">
                                            <p class="m-0 Heading">Product Name</p>
                                            <p class="m-0 Price">Price</p>
                                        </div>
                                    </div>
                                </div>

                                <a class="AddAProduct">
                                    <p class="m-0">Add Product</p>
                                </a>
                            </div>

                            <div class="col-lg-12 col-md-12 ProductService">
                                <div class="DataBlock">
                                    <img src="../assets/images/Icon24.png" alt="">
                                    <p class="m-0">Here, include your services</p>
                                </div>

                                <!-- Service Container -->
                                <div class="ProductContainer d-none">
                                    <div class="ProductBlock">
                                        <a href="" class="RemoveIcon">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                        <img src="../assets/images/ImageBack2.jpg" alt="">
                                        <div class="ProductTextBlock">
                                            <p class="m-0 Heading">Service Name</p>
                                            <p class="m-0 Price">Price</p>
                                        </div>
                                    </div>
                                </div>

                                <a class="AddAService">
                                    <p class="m-0">Add Service</p>
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="BusinessAddFooter">
                            <div class="AddProduct">
                                <input type="checkbox">
                                <p>Would you be interested in adding any products or services?</p>
                            </div>
                            <button type="button" class="btn btn-primary">Procced</button>
                        </div>

                        <div class="BusinessCategoryFooter">
                            <button type="button" class="btn btn-primary CategoryBackBtn">Back</button>
                            <button type="button" class="btn btn-primary CategoryNextBtn">Save & Continue</button>
                        </div>

                        <div class="BusinessProductDataFooter">
                            <button type="button" class="btn btn-primary ProductBackBtn">Back</button>
                            <button type="button" class="btn btn-primary ProductNextBtn">Submit</button>
                        </div>

                        <div class="BusinessServiceDataFooter">
                            <button type="button" class="btn btn-primary ServiceBackBtn">Back</button>
                            <button type="button" class="btn btn-primary ServiceNextBtn">Submit</button>
                        </div>

                        <div class="BusinessProductFooter">
                            <button type="button" class="btn btn-primary ProductFinalBtn">Back</button>
                            <button type="button" class="btn btn-primary">Submit Business</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Business Modal -->
        <div class="modal fade CustomModal" id="EditBusinessModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Business</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3">
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Business Name *</label>
                                <input type="text" placeholder="Enter business name">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Name</label>
                                <input type="text" placeholder="Enter your name">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Location *</label>
                                <input type="text" placeholder="Enter location">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Category *</label>
                                <select>
                                    <option selected disabled value="">Choose a category</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Tags</label>
                                <input type="text" placeholder="#Tag">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <label class="form-label">Description</label>
                                <textarea type="text" placeholder="Description"></textarea>
                            </div>
                            <div class="row m-0 pt-4 pb-2">
                                <div class="row m-0 InnerData g-3">
                                    <p class="Heading">Business Information</p>
                                    <div class="col-md-4 col-sm-12">
                                        <label class="form-label">Phone *</label>
                                        <input type="text" placeholder="Enter phone number">
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label class="form-label">Email *</label>
                                        <input type="text" placeholder="Enter email address">
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label class="form-label">Website</label>
                                        <input type="text" placeholder="Enter website URL">
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label class="form-label">Upload Images</label>
                                        <input type="file" class="form-control" id="inputGroupFile01">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Business Modal -->
        <div class="modal fade CustomModal" id="DeleteBusinessModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Business</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="InfoText">Do you really want your Business to be deleted? It cannot be undone once
                            deleted.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Details My Business Modal -->
        <div class="modal fade CustomModal" id="DetailsMyBusinessModal" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Business Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row PromotionDetail">
                            <div class="col-md-8 col-sm-12 PromotionImg">
                                <img class="w-100"
                                    src="https://img.freepik.com/free-photo/people-concert_1160-737.jpg?t=st=1730050734~exp=1730054334~hmac=4785251%E2%80%A6&w=900"
                                    alt="">
                            </div>
                            <div class="col-md-4 col-sm-12 PromotionData">
                                <img class="OwnerImg"
                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&amp;w=1887&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    alt="">
                                <p class="TitleText">Business Name</p>
                                <p class="OwnerText"><b>Location:</b></p>
                                <p class="OwnerText"><b>Phone No:</b></p>
                                <p class="OwnerText"><b>Email:</b></p>
                                <p class="OwnerText"><b>Website:</b></p>
                                <ul>
                                    <li>Tag Item</li>
                                    <li>Tag Item</li>
                                    <li>Tag</li>
                                    <li>Tag Item</li>
                                    <li>Tag Item</li>
                                </ul>
                                <div class="PeopleContainer">
                                    <div class="TopSection">
                                        <p>Invited People</p>
                                        <div class="d-flex flex-row gap-3">
                                            <a href="" data-bs-toggle="modal" data-bs-target="#BusinessInvitedModal">
                                                <img src="../assets/images/Icon7.png" alt="">
                                            </a>
                                            <a href="" data-bs-toggle="modal" data-bs-target="#BusinessInvitedModal">
                                                <img src="../assets/images/Icon6.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="PhotoSection">
                                        <img src="https://images.unsplash.com/photo-1541271696563-3be2f555fc4e?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/pleasant-looking-teenage-girl-wears-comfortable-hoodie-had-combed-dark-hair-looks-camera-with-little-smile_273609-38963.jpg?t=st=1731403649~exp=1731407249~hmac=963e1e2f465e3a549ade5f6d2b1a1c76cd808d814e09a26492d113f093c98df9&w=1380"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/happy-ethnic-teenager-with-afro-hair-smiles-positively-wears-purple-hoodie-being-good-mood_273609-46758.jpg?t=st=1731403690~exp=1731407290~hmac=897578c7d33f1e3ec028b597051e6fd4d50f34983a8216b006cbe6470479bcc6&w=1380"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/view-female-soccer-player_23-2150888397.jpg?t=st=1731403756~exp=1731407356~hmac=4056b8a1fc9e97b53ad916d89700567781e74de02d93a20828a84245bcc2b240&w=1380"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/close-up-woman-portrait-new-york_23-2150868218.jpg?t=st=1731403874~exp=1731407474~hmac=4b89bc31aa4d76a4a7861e2904825b05b0c42a47cccfa13bfe5ea4be52198ecf&w=1380"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/international-day-education-celebration_23-2150931022.jpg?t=st=1731403870~exp=1731407470~hmac=286b5917d5d08c0f5291a305bf2ea8abda079436000dcaa1fdb7b536cb1bbf2c&w=826"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/portrait-elegant-professional-businesswoman_23-2150917246.jpg?t=st=1731403456~exp=1731407056~hmac=709ab44fb2fe8a9c29b06e38c60ffa2dade979f272ab9821233ddfc73a4481a0&w=826"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/confident-young-businesswoman-smiling-looking-camera-indoors-generated-by-artificial-intelligence_188544-125559.jpg?t=st=1731403789~exp=1731407389~hmac=63d2f919b22ce1bc0a1ebbf081b67b0120c62ddc96a22e20802a9dcb22ec9f5d&w=1380"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/female-freelancer-portrait_1409-7005.jpg?t=st=1731403923~exp=1731407523~hmac=cac4092395d9d3bed18406c8be637fd00d88f7cccb769cf62cc6ea24c68bcc3b&w=1380"
                                            alt="">
                                        <span class="PhotoCount">
                                            <p>+5</p>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 PeopleContainer mt-2">
                                <div class="PeopleContainer">
                                    <div class="TopSection mb-0">
                                        <p>Products & Services</p>
                                        <div class="d-flex flex-row gap-3">
                                            <a href="">
                                                <i class="fa fa-plus" aria-hidden="true" style="color: #b48a42;"></i>
                                            </a>
                                            <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPSModal">
                                                <img src="../assets/images/Icon6.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ProductServiceSection ps-0">
                                        <div class="ProductBlock ps-0" data-bs-toggle="modal"
                                            data-bs-target="#ProductDetailsModal" style="cursor: pointer;">
                                            <img src="../assets/images/ImageBack1.jpg" alt="">
                                            <div class="ProductTextBlock">
                                                <p class="m-0 Heading">Product Name</p>
                                                <p class="m-0 Price">Price</p>
                                            </div>
                                        </div>
                                        <div class="ProductBlock ps-0" data-bs-toggle="modal"
                                            data-bs-target="#ProductDetailsModal" style="cursor: pointer;">
                                            <img src="../assets/images/ImageBack1.jpg" alt="">
                                            <div class="ProductTextBlock">
                                                <p class="m-0 Heading">Product Name</p>
                                                <p class="m-0 Price">Price</p>
                                            </div>
                                        </div>
                                        <div class="ProductBlock ps-0" data-bs-toggle="modal"
                                            data-bs-target="#ProductDetailsModal" style="cursor: pointer;">
                                            <img src="../assets/images/ImageBack1.jpg" alt="">
                                            <div class="ProductTextBlock">
                                                <p class="m-0 Heading">Product Name</p>
                                                <p class="m-0 Price">Price</p>
                                            </div>
                                        </div>
                                        <div class="ProductBlock ps-0" data-bs-toggle="modal"
                                            data-bs-target="#ProductDetailsModal" style="cursor: pointer;">
                                            <img src="../assets/images/ImageBack1.jpg" alt="">
                                            <div class="ProductTextBlock">
                                                <p class="m-0 Heading">Product Name</p>
                                                <p class="m-0 Price">Price</p>
                                            </div>
                                        </div>
                                        <div class="ProductBlock ps-0" data-bs-toggle="modal"
                                            data-bs-target="#ProductDetailsModal" style="cursor: pointer;">
                                            <img src="../assets/images/ImageBack1.jpg" alt="">
                                            <div class="ProductTextBlock">
                                                <p class="m-0 Heading">Product Name</p>
                                                <p class="m-0 Price">Price</p>
                                            </div>
                                        </div>
                                        <div class="ProductBlock ps-0" data-bs-toggle="modal"
                                            data-bs-target="#ServiceDetailsModal" style="cursor: pointer;">
                                            <img src="../assets/images/ImageBack2.jpg" alt="">
                                            <div class="ProductTextBlock">
                                                <p class="m-0 Heading">Service Name</p>
                                                <p class="m-0 Price">Price</p>
                                            </div>
                                        </div>
                                        <div class="ProductBlock ps-0" data-bs-toggle="modal"
                                            data-bs-target="#ServiceDetailsModal" style="cursor: pointer;">
                                            <img src="../assets/images/ImageBack2.jpg" alt="">
                                            <div class="ProductTextBlock">
                                                <p class="m-0 Heading">Service Name</p>
                                                <p class="m-0 Price">Price</p>
                                            </div>
                                        </div>
                                        <div class="ProductBlock ps-0" data-bs-toggle="modal"
                                            data-bs-target="#ServiceDetailsModal" style="cursor: pointer;">
                                            <img src="../assets/images/ImageBack2.jpg" alt="">
                                            <div class="ProductTextBlock">
                                                <p class="m-0 Heading">Service Name</p>
                                                <p class="m-0 Price">Price</p>
                                            </div>
                                        </div>
                                        <div class="ProductBlock ps-0" data-bs-toggle="modal"
                                            data-bs-target="#ServiceDetailsModal" style="cursor: pointer;">
                                            <img src="../assets/images/ImageBack2.jpg" alt="">
                                            <div class="ProductTextBlock">
                                                <p class="m-0 Heading">Service Name</p>
                                                <p class="m-0 Price">Price</p>
                                            </div>
                                        </div>
                                        <div class="ProductBlock ps-0" data-bs-toggle="modal"
                                            data-bs-target="#ServiceDetailsModal" style="cursor: pointer;">
                                            <img src="../assets/images/ImageBack2.jpg" alt="">
                                            <div class="ProductTextBlock">
                                                <p class="m-0 Heading">Service Name</p>
                                                <p class="m-0 Price">Price</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 PromotionData">
                                <p class="BodyText">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod
                                    molestias nihil vero
                                    quisquam
                                    assumenda. Consequuntur fuga veritatis quasi voluptates eum soluta ea quos eaque,
                                    hic possimus
                                    ipsum? Dicta, quisquam natus. Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Cumque iusto
                                    autem rerum quibusdam pariatur saepe earum, laboriosam quam ab illo quod ad ut
                                    voluptatem.
                                    Consectetur, unde. Odit, beatae? Fugiat, magni. Lorem ipsum dolor sit, amet
                                    consectetur adipisicing
                                    elit. Nemo tempora delectus, officiis corrupti perspiciatis quam temporibus!
                                    Placeat, consectetur
                                    possimus ab accusantium itaque numquam ea. Dicta deserunt quae blanditiis eaque
                                    fuga. Lorem ipsum
                                    dolor sit amet, consectetur adipisicing elit. Voluptates perferendis illum earum
                                    tempore, voluptas,
                                    facilis ullam illo sed provident tenetur quod accusantium harum, numquam nam
                                    consectetur aut
                                    consequuntur sunt quaerat? Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Eaque aperiam
                                    in similique quibusdam, ex veniam. Ullam, minus! Sapiente suscipit pariatur eum
                                    aspernatur
                                    laudantium earum! Quaerat, molestias ullam! Dolorum, sit similique. Lorem ipsum
                                    dolor sit amet,
                                    consectetur adipisicing elit. Exercitationem odio iure corporis deleniti unde quo ab
                                    atque soluta
                                    quam porro commodi quae ut natus, in voluptates quia quod fugit sint.</p>
                            </div>
                            <div class="col-md-12 col-sm-12 PeopleContainer mt-2">
                                <div class="TopSection">
                                    <p>Photos</p>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="../assets/images/Icon6.png" alt="">
                                    </a>
                                </div>
                                <div class="EventPhotoContainer">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/blue-holi-color-explosion-young-woman-dancing_23-2148129343.jpg?t=st=1731406746~exp=1731410346~hmac=aac3004aa5f9db23dd6c266f0c5351a065f18d551f3da09872c50dc1851d2c1f&w=1380"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/close-up-people-dancing-yellow-explosion-holi-color_23-2148129155.jpg?t=st=1731406654~exp=1731410254~hmac=e14e090ddbf68f2d9247a7ccfa46a4342c248a318fa4268954954fcbed03faea&w=740"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/green-holi-color-powder-crowd_23-2148129312.jpg?t=st=1731406659~exp=1731410259~hmac=bbd9797f2b5a6ab957dc738298432651e61989de3a9a3dac15534dc439224e36&w=1380"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/group-people-enjoying-holi-color_23-2148129319.jpg?t=st=1731406297~exp=1731409897~hmac=acd19fe86608034c5d2c2cddd5ba441729d9c046cfd629ff77eec2bc60c8b980&w=1380"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/black-man-surrounded-by-orange-smoke_410324-20.jpg?t=st=1731406716~exp=1731410316~hmac=793484971ee67895250accc8aa03bf8873cdb16f98f451ed9751c18de6dee65d&w=740"
                                            alt="">
                                    </a>
                                    <a href="" class="BlurrCover" data-bs-toggle="modal"
                                        data-bs-target="#BusinessPhotosModal">
                                        <div class="BlurrCoverData">
                                            <p>+ 10</p>
                                        </div>
                                        <img src="https://img.freepik.com/free-photo/green-blue-holi-color-powder-crowd_23-2148129315.jpg?t=st=1731407223~exp=1731410823~hmac=38dd34eb6b370798b180a31014e9d25d2e438d6d5b09c4b82e79e3d79448f403&w=1380"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Details Fav Business Modal -->
        <div class="modal fade CustomModal" id="FavBusinessModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Business Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row PromotionDetail">
                            <div class="col-md-8 col-sm-12 PromotionImg position-relative">
                                <div class="ProductIconContainer">
                                    <a href="" class="QRBlock" data-bs-toggle="modal" data-bs-target="#BusinessQRModal">
                                        <img class="QRImg" src="../assets/images/Icon27.png" alt="">
                                    </a>
                                </div>
                                <img class="w-100"
                                    src="https://img.freepik.com/free-photo/people-concert_1160-737.jpg?t=st=1730050734~exp=1730054334~hmac=4785251%E2%80%A6&w=900"
                                    alt="">
                            </div>
                            <div class="col-md-4 col-sm-12 PromotionData">
                                <img class="OwnerImg"
                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&amp;w=1887&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    alt="">
                                <p class="TitleText">Business Name</p>
                                <p class="OwnerText"><b>Location:</b></p>
                                <p class="OwnerText"><b>Phone No:</b></p>
                                <p class="OwnerText"><b>Email:</b></p>
                                <p class="OwnerText"><b>Website:</b></p>
                                <ul>
                                    <li>Tag Item</li>
                                    <li>Tag Item</li>
                                    <li>Tag</li>
                                    <li>Tag Item</li>
                                    <li>Tag Item</li>
                                </ul>
                                <div class="PeopleContainer">
                                    <div class="TopSection">
                                        <p>Invited People</p>
                                        <div class="d-flex flex-row gap-3">
                                            <a href="" data-bs-toggle="modal"
                                                data-bs-target="#BusinessInvitePeopleModal">
                                                <img src="../assets/images/Icon6.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="PhotoSection">
                                        <img src="https://images.unsplash.com/photo-1541271696563-3be2f555fc4e?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/pleasant-looking-teenage-girl-wears-comfortable-hoodie-had-combed-dark-hair-looks-camera-with-little-smile_273609-38963.jpg?t=st=1731403649~exp=1731407249~hmac=963e1e2f465e3a549ade5f6d2b1a1c76cd808d814e09a26492d113f093c98df9&w=1380"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/happy-ethnic-teenager-with-afro-hair-smiles-positively-wears-purple-hoodie-being-good-mood_273609-46758.jpg?t=st=1731403690~exp=1731407290~hmac=897578c7d33f1e3ec028b597051e6fd4d50f34983a8216b006cbe6470479bcc6&w=1380"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/view-female-soccer-player_23-2150888397.jpg?t=st=1731403756~exp=1731407356~hmac=4056b8a1fc9e97b53ad916d89700567781e74de02d93a20828a84245bcc2b240&w=1380"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/close-up-woman-portrait-new-york_23-2150868218.jpg?t=st=1731403874~exp=1731407474~hmac=4b89bc31aa4d76a4a7861e2904825b05b0c42a47cccfa13bfe5ea4be52198ecf&w=1380"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/international-day-education-celebration_23-2150931022.jpg?t=st=1731403870~exp=1731407470~hmac=286b5917d5d08c0f5291a305bf2ea8abda079436000dcaa1fdb7b536cb1bbf2c&w=826"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/portrait-elegant-professional-businesswoman_23-2150917246.jpg?t=st=1731403456~exp=1731407056~hmac=709ab44fb2fe8a9c29b06e38c60ffa2dade979f272ab9821233ddfc73a4481a0&w=826"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/confident-young-businesswoman-smiling-looking-camera-indoors-generated-by-artificial-intelligence_188544-125559.jpg?t=st=1731403789~exp=1731407389~hmac=63d2f919b22ce1bc0a1ebbf081b67b0120c62ddc96a22e20802a9dcb22ec9f5d&w=1380"
                                            alt="">
                                        <img class="position-absolute z-1"
                                            src="https://img.freepik.com/free-photo/female-freelancer-portrait_1409-7005.jpg?t=st=1731403923~exp=1731407523~hmac=cac4092395d9d3bed18406c8be637fd00d88f7cccb769cf62cc6ea24c68bcc3b&w=1380"
                                            alt="">
                                        <span class="PhotoCount">
                                            <p>+5</p>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 PeopleContainer mt-2">
                                <div class="PeopleContainer">
                                    <div class="TopSection mb-0">
                                        <p>Products & Services</p>
                                        <div class="d-flex flex-row gap-3">
                                            <a href="" data-bs-toggle="modal" data-bs-target="#FavBusinessPSModal">
                                                <img src="../assets/images/Icon6.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ProductServiceSection ps-0" data-bs-toggle="modal"
                                        data-bs-target="#FavProductDetailsModal">
                                        <div class="ProductBlock ps-0" style="cursor: pointer;">
                                            <img src="../assets/images/ImageBack1.jpg" alt="">
                                            <div class="ProductTextBlock">
                                                <p class="m-0 Heading">Product Name</p>
                                                <p class="m-0 Price">Price</p>
                                            </div>
                                            <a class="AddToCartBlock AddToCartNotify">
                                                <img class="ColorIcon" src="../assets/images/NavIcon6.png" alt="">
                                                <img class="WhiteIcon" src="../assets/images/Icon26.png" alt="">
                                            </a>
                                        </div>
                                        <div class="ProductBlock ps-0" data-bs-toggle="modal"
                                            data-bs-target="#FavProductDetailsModal" style="cursor: pointer;">
                                            <img src="../assets/images/ImageBack1.jpg" alt="">
                                            <div class="ProductTextBlock">
                                                <p class="m-0 Heading">Product Name</p>
                                                <p class="m-0 Price">Price</p>
                                            </div>
                                            <a class="AddToCartBlock AddToCartNotify">
                                                <img class="ColorIcon" src="../assets/images/NavIcon6.png" alt="">
                                                <img class="WhiteIcon" src="../assets/images/Icon26.png" alt="">
                                            </a>
                                        </div>
                                        <div class="ProductBlock ps-0" data-bs-toggle="modal"
                                            data-bs-target="#FavProductDetailsModal" style="cursor: pointer;">
                                            <img src="../assets/images/ImageBack1.jpg" alt="">
                                            <div class="ProductTextBlock">
                                                <p class="m-0 Heading">Product Name</p>
                                                <p class="m-0 Price">Price</p>
                                            </div>
                                            <a class="AddToCartBlock AddToCartNotify">
                                                <img class="ColorIcon" src="../assets/images/NavIcon6.png" alt="">
                                                <img class="WhiteIcon" src="../assets/images/Icon26.png" alt="">
                                            </a>
                                        </div>
                                        <div class="ProductBlock ps-0" data-bs-toggle="modal"
                                            data-bs-target="#FavProductDetailsModal" style="cursor: pointer;">
                                            <img src="../assets/images/ImageBack1.jpg" alt="">
                                            <div class="ProductTextBlock">
                                                <p class="m-0 Heading">Product Name</p>
                                                <p class="m-0 Price">Price</p>
                                            </div>
                                            <a class="AddToCartBlock AddToCartNotify">
                                                <img class="ColorIcon" src="../assets/images/NavIcon6.png" alt="">
                                                <img class="WhiteIcon" src="../assets/images/Icon26.png" alt="">
                                            </a>
                                        </div>
                                        <div class="ProductBlock ps-0" data-bs-toggle="modal"
                                            data-bs-target="#FavProductDetailsModal" style="cursor: pointer;">
                                            <img src="../assets/images/ImageBack1.jpg" alt="">
                                            <div class="ProductTextBlock">
                                                <p class="m-0 Heading">Product Name</p>
                                                <p class="m-0 Price">Price</p>
                                            </div>
                                            <a class="AddToCartBlock AddToCartNotify">
                                                <img class="ColorIcon" src="../assets/images/NavIcon6.png" alt="">
                                                <img class="WhiteIcon" src="../assets/images/Icon26.png" alt="">
                                            </a>
                                        </div>
                                        <div class="ProductBlock ps-0" data-bs-toggle="modal"
                                            data-bs-target="#FavServiceDetailsModal" style="cursor: pointer;">
                                            <img src="../assets/images/ImageBack2.jpg" alt="">
                                            <div class="ProductTextBlock">
                                                <p class="m-0 Heading">Service Name</p>
                                                <p class="m-0 Price">Price</p>
                                            </div>
                                            <a class="AddToCartBlock AddToCartNotify">
                                                <img class="ColorIcon" src="../assets/images/NavIcon6.png" alt="">
                                                <img class="WhiteIcon" src="../assets/images/Icon26.png" alt="">
                                            </a>
                                        </div>
                                        <div class="ProductBlock ps-0" data-bs-toggle="modal"
                                            data-bs-target="#FavServiceDetailsModal" style="cursor: pointer;">
                                            <img src="../assets/images/ImageBack2.jpg" alt="">
                                            <div class="ProductTextBlock">
                                                <p class="m-0 Heading">Service Name</p>
                                                <p class="m-0 Price">Price</p>
                                            </div>
                                            <a class="AddToCartBlock AddToCartNotify">
                                                <img class="ColorIcon" src="../assets/images/NavIcon6.png" alt="">
                                                <img class="WhiteIcon" src="../assets/images/Icon26.png" alt="">
                                            </a>
                                        </div>
                                        <div class="ProductBlock ps-0" data-bs-toggle="modal"
                                            data-bs-target="#FavServiceDetailsModal" style="cursor: pointer;">
                                            <img src="../assets/images/ImageBack2.jpg" alt="">
                                            <div class="ProductTextBlock">
                                                <p class="m-0 Heading">Service Name</p>
                                                <p class="m-0 Price">Price</p>
                                            </div>
                                            <a class="AddToCartBlock AddToCartNotify">
                                                <img class="ColorIcon" src="../assets/images/NavIcon6.png" alt="">
                                                <img class="WhiteIcon" src="../assets/images/Icon26.png" alt="">
                                            </a>
                                        </div>
                                        <div class="ProductBlock ps-0" data-bs-toggle="modal"
                                            data-bs-target="#FavServiceDetailsModal" style="cursor: pointer;">
                                            <img src="../assets/images/ImageBack2.jpg" alt="">
                                            <div class="ProductTextBlock">
                                                <p class="m-0 Heading">Service Name</p>
                                                <p class="m-0 Price">Price</p>
                                            </div>
                                            <a class="AddToCartBlock AddToCartNotify">
                                                <img class="ColorIcon" src="../assets/images/NavIcon6.png" alt="">
                                                <img class="WhiteIcon" src="../assets/images/Icon26.png" alt="">
                                            </a>
                                        </div>
                                        <div class="ProductBlock ps-0" data-bs-toggle="modal"
                                            data-bs-target="#FavServiceDetailsModal" style="cursor: pointer;">
                                            <img src="../assets/images/ImageBack2.jpg" alt="">
                                            <div class="ProductTextBlock">
                                                <p class="m-0 Heading">Service Name</p>
                                                <p class="m-0 Price">Price</p>
                                            </div>
                                            <a class="AddToCartBlock AddToCartNotify">
                                                <img class="ColorIcon" src="../assets/images/NavIcon6.png" alt="">
                                                <img class="WhiteIcon" src="../assets/images/Icon26.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 PromotionData">
                                <p class="BodyText">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod
                                    molestias nihil vero
                                    quisquam
                                    assumenda. Consequuntur fuga veritatis quasi voluptates eum soluta ea quos eaque,
                                    hic possimus
                                    ipsum? Dicta, quisquam natus. Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Cumque iusto
                                    autem rerum quibusdam pariatur saepe earum, laboriosam quam ab illo quod ad ut
                                    voluptatem.
                                    Consectetur, unde. Odit, beatae? Fugiat, magni. Lorem ipsum dolor sit, amet
                                    consectetur adipisicing
                                    elit. Nemo tempora delectus, officiis corrupti perspiciatis quam temporibus!
                                    Placeat, consectetur
                                    possimus ab accusantium itaque numquam ea. Dicta deserunt quae blanditiis eaque
                                    fuga. Lorem ipsum
                                    dolor sit amet, consectetur adipisicing elit. Voluptates perferendis illum earum
                                    tempore, voluptas,
                                    facilis ullam illo sed provident tenetur quod accusantium harum, numquam nam
                                    consectetur aut
                                    consequuntur sunt quaerat? Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Eaque aperiam
                                    in similique quibusdam, ex veniam. Ullam, minus! Sapiente suscipit pariatur eum
                                    aspernatur
                                    laudantium earum! Quaerat, molestias ullam! Dolorum, sit similique. Lorem ipsum
                                    dolor sit amet,
                                    consectetur adipisicing elit. Exercitationem odio iure corporis deleniti unde quo ab
                                    atque soluta
                                    quam porro commodi quae ut natus, in voluptates quia quod fugit sint.
                                </p>
                            </div>
                            <div class="col-md-12 col-sm-12 PeopleContainer mt-2">
                                <div class="TopSection">
                                    <p>Photos</p>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="../assets/images/Icon6.png" alt="">
                                    </a>
                                </div>
                                <div class="EventPhotoContainer">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/blue-holi-color-explosion-young-woman-dancing_23-2148129343.jpg?t=st=1731406746~exp=1731410346~hmac=aac3004aa5f9db23dd6c266f0c5351a065f18d551f3da09872c50dc1851d2c1f&w=1380"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/close-up-people-dancing-yellow-explosion-holi-color_23-2148129155.jpg?t=st=1731406654~exp=1731410254~hmac=e14e090ddbf68f2d9247a7ccfa46a4342c248a318fa4268954954fcbed03faea&w=740"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/green-holi-color-powder-crowd_23-2148129312.jpg?t=st=1731406659~exp=1731410259~hmac=bbd9797f2b5a6ab957dc738298432651e61989de3a9a3dac15534dc439224e36&w=1380"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/group-people-enjoying-holi-color_23-2148129319.jpg?t=st=1731406297~exp=1731409897~hmac=acd19fe86608034c5d2c2cddd5ba441729d9c046cfd629ff77eec2bc60c8b980&w=1380"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/black-man-surrounded-by-orange-smoke_410324-20.jpg?t=st=1731406716~exp=1731410316~hmac=793484971ee67895250accc8aa03bf8873cdb16f98f451ed9751c18de6dee65d&w=740"
                                            alt="">
                                    </a>
                                    <a href="" class="BlurrCover" data-bs-toggle="modal"
                                        data-bs-target="#BusinessPhotosModal">
                                        <div class="BlurrCoverData">
                                            <p>+ 10</p>
                                        </div>
                                        <img src="https://img.freepik.com/free-photo/green-blue-holi-color-powder-crowd_23-2148129315.jpg?t=st=1731407223~exp=1731410823~hmac=38dd34eb6b370798b180a31014e9d25d2e438d6d5b09c4b82e79e3d79448f403&w=1380"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Business Photos Modal -->
        <div class="modal fade CustomModal" id="BusinessPhotosModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Photos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row PromotionDetail">
                            <div class="col-md-12 col-sm-12 PromotionImg">
                                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img style="height: 75vh;"
                                                src="https://img.freepik.com/free-photo/blue-holi-color-explosion-young-woman-dancing_23-2148129343.jpg?t=st=1731406746~exp=1731410346~hmac=aac3004aa5f9db23dd6c266f0c5351a065f18d551f3da09872c50dc1851d2c1f&w=1380"
                                                class="d-block w-100" alt="">
                                        </div>
                                        <div class="carousel-item">
                                            <img style="height: 75vh;"
                                                src="https://img.freepik.com/free-photo/close-up-people-dancing-yellow-explosion-holi-color_23-2148129155.jpg?t=st=1731406654~exp=1731410254~hmac=e14e090ddbf68f2d9247a7ccfa46a4342c248a318fa4268954954fcbed03faea&w=740"
                                                class="d-block w-100" alt="">
                                        </div>
                                        <div class="carousel-item">
                                            <img style="height: 75vh;"
                                                src="https://img.freepik.com/free-photo/green-holi-color-powder-crowd_23-2148129312.jpg?t=st=1731406659~exp=1731410259~hmac=bbd9797f2b5a6ab957dc738298432651e61989de3a9a3dac15534dc439224e36&w=1380"
                                                class="d-block w-100" alt="">
                                        </div>
                                        <div class="carousel-item">
                                            <img style="height: 75vh;"
                                                src="https://img.freepik.com/free-photo/group-people-enjoying-holi-color_23-2148129319.jpg?t=st=1731406297~exp=1731409897~hmac=acd19fe86608034c5d2c2cddd5ba441729d9c046cfd629ff77eec2bc60c8b980&w=1380"
                                                class="d-block w-100" alt="">
                                        </div>
                                        <div class="carousel-item">
                                            <img style="height: 75vh;"
                                                src="https://img.freepik.com/free-photo/black-man-surrounded-by-orange-smoke_410324-20.jpg?t=st=1731406716~exp=1731410316~hmac=793484971ee67895250accc8aa03bf8873cdb16f98f451ed9751c18de6dee65d&w=740"
                                                class="d-block w-100" alt="">
                                        </div>
                                        <div class="carousel-item">
                                            <img style="height: 75vh;"
                                                src="https://img.freepik.com/free-photo/green-blue-holi-color-powder-crowd_23-2148129315.jpg?t=st=1731407223~exp=1731410823~hmac=38dd34eb6b370798b180a31014e9d25d2e438d6d5b09c4b82e79e3d79448f403&w=1380"
                                                class="d-block w-100" alt="">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- My Business Product & Service Modal -->
        <div class="modal fade CustomModal" id="BusinessPSModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Products & Services</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row m-0 InvitedPeopleTab">
                            <div class="col-md-12 col-sm-12">
                                <!-- Tabs Navigation -->
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="Products-Tab" data-bs-toggle="tab"
                                            data-bs-target="#ProductsTab" type="button" role="tab"
                                            aria-controls="AllTab" aria-selected="true">Products</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="Services-Tab" data-bs-toggle="tab"
                                            data-bs-target="#ServicesTab" type="button" role="tab"
                                            aria-controls="profile" aria-selected="false">Services</button>
                                    </li>
                                </ul>

                                <input class="form-control mt-4 mb-4 SearchBarInner" type="search" placeholder="Search"
                                    aria-label="Search">

                                <!-- Tabs Content -->
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="ProductsTab" role="tabpanel"
                                        aria-labelledby="Products-Tab">
                                        <div class="row m-0 ProductContainer ps-0 pe-0">
                                            <div class="ProductBlock p-0" data-bs-toggle="modal"
                                                data-bs-target="#ProductDetailsModal" style="cursor: pointer;">
                                                <img src="../assets/images/ImageBack1.jpg" alt="">
                                                <div class="ProductTextBlock">
                                                    <p class="m-0 Heading">Product Name</p>
                                                    <p class="m-0 Price">Price</p>
                                                </div>
                                            </div>
                                            <div class="ProductBlock p-0" data-bs-toggle="modal"
                                                data-bs-target="#ProductDetailsModal" style="cursor: pointer;">
                                                <img src="../assets/images/ImageBack1.jpg" alt="">
                                                <div class="ProductTextBlock">
                                                    <p class="m-0 Heading">Product Name</p>
                                                    <p class="m-0 Price">Price</p>
                                                </div>
                                            </div>
                                            <div class="ProductBlock p-0" data-bs-toggle="modal"
                                                data-bs-target="#ProductDetailsModal" style="cursor: pointer;">
                                                <img src="../assets/images/ImageBack1.jpg" alt="">
                                                <div class="ProductTextBlock">
                                                    <p class="m-0 Heading">Product Name</p>
                                                    <p class="m-0 Price">Price</p>
                                                </div>
                                            </div>
                                            <div class="ProductBlock p-0" data-bs-toggle="modal"
                                                data-bs-target="#ProductDetailsModal" style="cursor: pointer;">
                                                <img src="../assets/images/ImageBack1.jpg" alt="">
                                                <div class="ProductTextBlock">
                                                    <p class="m-0 Heading">Product Name</p>
                                                    <p class="m-0 Price">Price</p>
                                                </div>
                                            </div>
                                            <div class="ProductBlock p-0" data-bs-toggle="modal"
                                                data-bs-target="#ProductDetailsModal" style="cursor: pointer;">
                                                <img src="../assets/images/ImageBack1.jpg" alt="">
                                                <div class="ProductTextBlock">
                                                    <p class="m-0 Heading">Product Name</p>
                                                    <p class="m-0 Price">Price</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="ServicesTab" role="tabpanel"
                                        aria-labelledby="Services-Tab">
                                        <div class="row m-0 ServiceContainer">
                                            <div class="ProductBlock p-0" data-bs-toggle="modal"
                                                data-bs-target="#ServiceDetailsModal" style="cursor: pointer;">
                                                <img src="../assets/images/ImageBack2.jpg" alt="">
                                                <div class="ProductTextBlock">
                                                    <p class="m-0 Heading">Service Name</p>
                                                    <p class="m-0 Price">Price</p>
                                                </div>
                                            </div>
                                            <div class="ProductBlock p-0" data-bs-toggle="modal"
                                                data-bs-target="#ServiceDetailsModal" style="cursor: pointer;">
                                                <img src="../assets/images/ImageBack2.jpg" alt="">
                                                <div class="ProductTextBlock">
                                                    <p class="m-0 Heading">Service Name</p>
                                                    <p class="m-0 Price">Price</p>
                                                </div>
                                            </div>
                                            <div class="ProductBlock p-0" data-bs-toggle="modal"
                                                data-bs-target="#ServiceDetailsModal" style="cursor: pointer;">
                                                <img src="../assets/images/ImageBack2.jpg" alt="">
                                                <div class="ProductTextBlock">
                                                    <p class="m-0 Heading">Service Name</p>
                                                    <p class="m-0 Price">Price</p>
                                                </div>
                                            </div>
                                            <div class="ProductBlock p-0" data-bs-toggle="modal"
                                                data-bs-target="#ServiceDetailsModal" style="cursor: pointer;">
                                                <img src="../assets/images/ImageBack2.jpg" alt="">
                                                <div class="ProductTextBlock">
                                                    <p class="m-0 Heading">Service Name</p>
                                                    <p class="m-0 Price">Price</p>
                                                </div>
                                            </div>
                                            <div class="ProductBlock p-0" data-bs-toggle="modal"
                                                data-bs-target="#ServiceDetailsModal" style="cursor: pointer;">
                                                <img src="../assets/images/ImageBack2.jpg" alt="">
                                                <div class="ProductTextBlock">
                                                    <p class="m-0 Heading">Service Name</p>
                                                    <p class="m-0 Price">Price</p>
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

        <!-- Favorite Business Product & Service Modal -->
        <div class="modal fade CustomModal" id="FavBusinessPSModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Products & Services</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row m-0 InvitedPeopleTab">
                            <div class="col-md-12 col-sm-12">
                                <!-- Tabs Navigation -->
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="Products-Tab" data-bs-toggle="tab"
                                            data-bs-target="#ProductsTab1" type="button" role="tab"
                                            aria-controls="AllTab" aria-selected="true">Products</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="Services-Tab" data-bs-toggle="tab"
                                            data-bs-target="#ServicesTab1" type="button" role="tab"
                                            aria-controls="profile" aria-selected="false">Services</button>
                                    </li>
                                </ul>

                                <input class="form-control mt-4 mb-4 SearchBarInner" type="search" placeholder="Search"
                                    aria-label="Search">

                                <!-- Tabs Content -->
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="ProductsTab1" role="tabpanel"
                                        aria-labelledby="Products-Tab">
                                        <div class="row m-0 ProductContainer ps-0 pe-0">
                                            <div class="ProductBlock p-0" data-bs-toggle="modal"
                                                data-bs-target="#FavProductDetailsModal" style="cursor: pointer;">
                                                <img src="../assets/images/ImageBack1.jpg" alt="">
                                                <div class="ProductTextBlock">
                                                    <p class="m-0 Heading">Product Name</p>
                                                    <p class="m-0 Price">Price</p>
                                                </div>
                                                <a class="AddToCartBlock AddToCartNotify">
                                                    <img class="ColorIcon" src="../assets/images/NavIcon6.png" alt="">
                                                    <img class="WhiteIcon" src="../assets/images/Icon26.png" alt="">
                                                </a>
                                            </div>
                                            <div class="ProductBlock p-0" data-bs-toggle="modal"
                                                data-bs-target="#FavProductDetailsModal" style="cursor: pointer;">
                                                <img src="../assets/images/ImageBack1.jpg" alt="">
                                                <div class="ProductTextBlock">
                                                    <p class="m-0 Heading">Product Name</p>
                                                    <p class="m-0 Price">Price</p>
                                                </div>
                                                <a class="AddToCartBlock AddToCartNotify">
                                                    <img class="ColorIcon" src="../assets/images/NavIcon6.png" alt="">
                                                    <img class="WhiteIcon" src="../assets/images/Icon26.png" alt="">
                                                </a>
                                            </div>
                                            <div class="ProductBlock p-0" data-bs-toggle="modal"
                                                data-bs-target="#FavProductDetailsModal" style="cursor: pointer;">
                                                <img src="../assets/images/ImageBack1.jpg" alt="">
                                                <div class="ProductTextBlock">
                                                    <p class="m-0 Heading">Product Name</p>
                                                    <p class="m-0 Price">Price</p>
                                                </div>
                                                <a class="AddToCartBlock AddToCartNotify">
                                                    <img class="ColorIcon" src="../assets/images/NavIcon6.png" alt="">
                                                    <img class="WhiteIcon" src="../assets/images/Icon26.png" alt="">
                                                </a>
                                            </div>
                                            <div class="ProductBlock p-0" data-bs-toggle="modal"
                                                data-bs-target="#FavProductDetailsModal" style="cursor: pointer;">
                                                <img src="../assets/images/ImageBack1.jpg" alt="">
                                                <div class="ProductTextBlock">
                                                    <p class="m-0 Heading">Product Name</p>
                                                    <p class="m-0 Price">Price</p>
                                                </div>
                                                <a class="AddToCartBlock AddToCartNotify">
                                                    <img class="ColorIcon" src="../assets/images/NavIcon6.png" alt="">
                                                    <img class="WhiteIcon" src="../assets/images/Icon26.png" alt="">
                                                </a>
                                            </div>
                                            <div class="ProductBlock p-0" data-bs-toggle="modal"
                                                data-bs-target="#FavProductDetailsModal" style="cursor: pointer;">
                                                <img src="../assets/images/ImageBack1.jpg" alt="">
                                                <div class="ProductTextBlock">
                                                    <p class="m-0 Heading">Product Name</p>
                                                    <p class="m-0 Price">Price</p>
                                                </div>
                                                <a class="AddToCartBlock AddToCartNotify">
                                                    <img class="ColorIcon" src="../assets/images/NavIcon6.png" alt="">
                                                    <img class="WhiteIcon" src="../assets/images/Icon26.png" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="ServicesTab1" role="tabpanel"
                                        aria-labelledby="Services-Tab">
                                        <div class="row m-0 ServiceContainer">
                                            <div class="ProductBlock p-0" data-bs-toggle="modal"
                                                data-bs-target="#FavServiceDetailsModal" style="cursor: pointer;">
                                                <img src="../assets/images/ImageBack2.jpg" alt="">
                                                <div class="ProductTextBlock">
                                                    <p class="m-0 Heading">Service Name</p>
                                                    <p class="m-0 Price">Price</p>
                                                </div>
                                                <a class="AddToCartBlock AddToCartNotify">
                                                    <img class="ColorIcon" src="../assets/images/NavIcon6.png" alt="">
                                                    <img class="WhiteIcon" src="../assets/images/Icon26.png" alt="">
                                                </a>
                                            </div>
                                            <div class="ProductBlock p-0" data-bs-toggle="modal"
                                                data-bs-target="#FavServiceDetailsModal" style="cursor: pointer;">
                                                <img src="../assets/images/ImageBack2.jpg" alt="">
                                                <div class="ProductTextBlock">
                                                    <p class="m-0 Heading">Service Name</p>
                                                    <p class="m-0 Price">Price</p>
                                                </div>
                                                <a class="AddToCartBlock AddToCartNotify">
                                                    <img class="ColorIcon" src="../assets/images/NavIcon6.png" alt="">
                                                    <img class="WhiteIcon" src="../assets/images/Icon26.png" alt="">
                                                </a>
                                            </div>
                                            <div class="ProductBlock p-0" data-bs-toggle="modal"
                                                data-bs-target="#FavServiceDetailsModal" style="cursor: pointer;">
                                                <img src="../assets/images/ImageBack2.jpg" alt="">
                                                <div class="ProductTextBlock">
                                                    <p class="m-0 Heading">Service Name</p>
                                                    <p class="m-0 Price">Price</p>
                                                </div>
                                                <a class="AddToCartBlock AddToCartNotify">
                                                    <img class="ColorIcon" src="../assets/images/NavIcon6.png" alt="">
                                                    <img class="WhiteIcon" src="../assets/images/Icon26.png" alt="">
                                                </a>
                                            </div>
                                            <div class="ProductBlock p-0" data-bs-toggle="modal"
                                                data-bs-target="#FavServiceDetailsModal" style="cursor: pointer;">
                                                <img src="../assets/images/ImageBack2.jpg" alt="">
                                                <div class="ProductTextBlock">
                                                    <p class="m-0 Heading">Service Name</p>
                                                    <p class="m-0 Price">Price</p>
                                                </div>
                                                <a class="AddToCartBlock AddToCartNotify">
                                                    <img class="ColorIcon" src="../assets/images/NavIcon6.png" alt="">
                                                    <img class="WhiteIcon" src="../assets/images/Icon26.png" alt="">
                                                </a>
                                            </div>
                                            <div class="ProductBlock p-0" data-bs-toggle="modal"
                                                data-bs-target="#FavServiceDetailsModal" style="cursor: pointer;">
                                                <img src="../assets/images/ImageBack2.jpg" alt="">
                                                <div class="ProductTextBlock">
                                                    <p class="m-0 Heading">Service Name</p>
                                                    <p class="m-0 Price">Price</p>
                                                </div>
                                                <a class="AddToCartBlock AddToCartNotify">
                                                    <img class="ColorIcon" src="../assets/images/NavIcon6.png" alt="">
                                                    <img class="WhiteIcon" src="../assets/images/Icon26.png" alt="">
                                                </a>
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

        <!-- My Product Details Modal -->
        <div class="modal fade CustomModal" id="ProductDetailsModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Product Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row PromotionDetail">
                            <div class="col-md-8 col-sm-12 PromotionImg position-relative">
                                <img class="w-100" src="../assets/images/ImageBack1.jpg" alt="">
                                <div class="ProductIconContainer">
                                    <a href="">
                                        <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#DeleteProductModal">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 PromotionData">
                                <img class="OwnerImg"
                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&amp;w=1887&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    alt="">
                                <p class="TitleText">Product Name</p>
                                <p class="OwnerText"><b>Price:</b></p>
                                <ul>
                                    <li>Tag Item</li>
                                    <li>Tag Item</li>
                                    <li>Tag</li>
                                    <li>Tag Item</li>
                                    <li>Tag Item</li>
                                </ul>
                            </div>
                            <div class="col-md-12 col-sm-12 PromotionData">
                                <p class="BodyText">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod
                                    molestias nihil
                                    vero
                                    quisquam
                                    assumenda. Consequuntur fuga veritatis quasi voluptates eum soluta ea quos eaque,
                                    hic possimus
                                    ipsum? Dicta, quisquam natus. Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Cumque
                                    iusto
                                    autem rerum quibusdam pariatur saepe earum, laboriosam quam ab illo quod ad ut
                                    voluptatem.
                                    Consectetur, unde. Odit, beatae? Fugiat, magni. Lorem ipsum dolor sit, amet
                                    consectetur
                                    adipisicing
                                    elit. Nemo tempora delectus, officiis corrupti perspiciatis quam temporibus!
                                    Placeat,
                                    consectetur
                                    possimus ab accusantium itaque numquam ea. Dicta deserunt quae blanditiis eaque
                                    fuga. Lorem
                                    ipsum
                                    dolor sit amet, consectetur adipisicing elit. Voluptates perferendis illum earum
                                    tempore,
                                    voluptas,
                                    facilis ullam illo sed provident tenetur quod accusantium harum, numquam nam
                                    consectetur aut
                                    consequuntur sunt quaerat? Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Eaque
                                    aperiam
                                    in similique quibusdam, ex veniam. Ullam, minus! Sapiente suscipit pariatur eum
                                    aspernatur
                                    laudantium earum! Quaerat, molestias ullam! Dolorum, sit similique. Lorem ipsum
                                    dolor sit amet,
                                    consectetur adipisicing elit. Exercitationem odio iure corporis deleniti unde quo ab
                                    atque
                                    soluta
                                    quam porro commodi quae ut natus, in voluptates quia quod fugit sint.</p>
                            </div>
                            <div class="col-md-12 col-sm-12 PeopleContainer mt-2">
                                <div class="TopSection">
                                    <p>Photos</p>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="../assets/images/Icon6.png" alt="">
                                    </a>
                                </div>
                                <div class="EventPhotoContainer">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/blue-holi-color-explosion-young-woman-dancing_23-2148129343.jpg?t=st=1731406746~exp=1731410346~hmac=aac3004aa5f9db23dd6c266f0c5351a065f18d551f3da09872c50dc1851d2c1f&w=1380"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/close-up-people-dancing-yellow-explosion-holi-color_23-2148129155.jpg?t=st=1731406654~exp=1731410254~hmac=e14e090ddbf68f2d9247a7ccfa46a4342c248a318fa4268954954fcbed03faea&w=740"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/green-holi-color-powder-crowd_23-2148129312.jpg?t=st=1731406659~exp=1731410259~hmac=bbd9797f2b5a6ab957dc738298432651e61989de3a9a3dac15534dc439224e36&w=1380"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/group-people-enjoying-holi-color_23-2148129319.jpg?t=st=1731406297~exp=1731409897~hmac=acd19fe86608034c5d2c2cddd5ba441729d9c046cfd629ff77eec2bc60c8b980&w=1380"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/black-man-surrounded-by-orange-smoke_410324-20.jpg?t=st=1731406716~exp=1731410316~hmac=793484971ee67895250accc8aa03bf8873cdb16f98f451ed9751c18de6dee65d&w=740"
                                            alt="">
                                    </a>
                                    <a href="" class="BlurrCover" data-bs-toggle="modal"
                                        data-bs-target="#BusinessPhotosModal">
                                        <div class="BlurrCoverData">
                                            <p>+ 10</p>
                                        </div>
                                        <img src="https://img.freepik.com/free-photo/green-blue-holi-color-powder-crowd_23-2148129315.jpg?t=st=1731407223~exp=1731410823~hmac=38dd34eb6b370798b180a31014e9d25d2e438d6d5b09c4b82e79e3d79448f403&w=1380"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fav Product Details Modal -->
        <div class="modal fade CustomModal" id="FavProductDetailsModal" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Product Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row PromotionDetail">
                            <div class="col-md-8 col-sm-12 PromotionImg position-relative">
                                <img class="w-100" src="../assets/images/ImageBack1.jpg" alt="">
                                <div class="ProductIconContainer">
                                    <a href="" class="QRBlock" data-bs-toggle="modal" data-bs-target="#BusinessQRModal">
                                        <img class="QRImg" src="../assets/images/Icon27.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 PromotionData">
                                <img class="OwnerImg"
                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&amp;w=1887&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    alt="">
                                <p class="TitleText">Product Name</p>
                                <p class="OwnerText"><b>Price:</b></p>
                                <ul>
                                    <li>Tag Item</li>
                                    <li>Tag Item</li>
                                    <li>Tag</li>
                                    <li>Tag Item</li>
                                    <li>Tag Item</li>
                                </ul>
                                <div class="QuantityAddBlock">
                                    <p class="m-0 QuantityTextHeading">Quantity</p>
                                    <div class="QuantityContainer">
                                        <a class="decrement">
                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                        </a>
                                        <span>
                                            <p class="m-0 QuantityCount counter">1</p>
                                        </span>
                                        <a class="increment">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="BtnContainer">
                                    <a class="BuyNowBtn" id="BuyNowSection">
                                        <p class="m-0">Buy Now</p>
                                    </a>
                                    <a class="AddToCartBtn AddToCartNotify">
                                        <img src="../assets/images/Icon25.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 PromotionData">
                                <p class="BodyText">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod
                                    molestias nihil
                                    vero
                                    quisquam
                                    assumenda. Consequuntur fuga veritatis quasi voluptates eum soluta ea quos eaque,
                                    hic possimus
                                    ipsum? Dicta, quisquam natus. Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Cumque
                                    iusto
                                    autem rerum quibusdam pariatur saepe earum, laboriosam quam ab illo quod ad ut
                                    voluptatem.
                                    Consectetur, unde. Odit, beatae? Fugiat, magni. Lorem ipsum dolor sit, amet
                                    consectetur
                                    adipisicing
                                    elit. Nemo tempora delectus, officiis corrupti perspiciatis quam temporibus!
                                    Placeat,
                                    consectetur
                                    possimus ab accusantium itaque numquam ea. Dicta deserunt quae blanditiis eaque
                                    fuga. Lorem
                                    ipsum
                                    dolor sit amet, consectetur adipisicing elit. Voluptates perferendis illum earum
                                    tempore,
                                    voluptas,
                                    facilis ullam illo sed provident tenetur quod accusantium harum, numquam nam
                                    consectetur aut
                                    consequuntur sunt quaerat? Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Eaque
                                    aperiam
                                    in similique quibusdam, ex veniam. Ullam, minus! Sapiente suscipit pariatur eum
                                    aspernatur
                                    laudantium earum! Quaerat, molestias ullam! Dolorum, sit similique. Lorem ipsum
                                    dolor sit amet,
                                    consectetur adipisicing elit. Exercitationem odio iure corporis deleniti unde quo ab
                                    atque
                                    soluta
                                    quam porro commodi quae ut natus, in voluptates quia quod fugit sint.</p>
                            </div>
                            <div class="col-md-12 col-sm-12 PeopleContainer mt-2">
                                <div class="TopSection">
                                    <p>Photos</p>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="../assets/images/Icon6.png" alt="">
                                    </a>
                                </div>
                                <div class="EventPhotoContainer">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/blue-holi-color-explosion-young-woman-dancing_23-2148129343.jpg?t=st=1731406746~exp=1731410346~hmac=aac3004aa5f9db23dd6c266f0c5351a065f18d551f3da09872c50dc1851d2c1f&w=1380"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/close-up-people-dancing-yellow-explosion-holi-color_23-2148129155.jpg?t=st=1731406654~exp=1731410254~hmac=e14e090ddbf68f2d9247a7ccfa46a4342c248a318fa4268954954fcbed03faea&w=740"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/green-holi-color-powder-crowd_23-2148129312.jpg?t=st=1731406659~exp=1731410259~hmac=bbd9797f2b5a6ab957dc738298432651e61989de3a9a3dac15534dc439224e36&w=1380"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/group-people-enjoying-holi-color_23-2148129319.jpg?t=st=1731406297~exp=1731409897~hmac=acd19fe86608034c5d2c2cddd5ba441729d9c046cfd629ff77eec2bc60c8b980&w=1380"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/black-man-surrounded-by-orange-smoke_410324-20.jpg?t=st=1731406716~exp=1731410316~hmac=793484971ee67895250accc8aa03bf8873cdb16f98f451ed9751c18de6dee65d&w=740"
                                            alt="">
                                    </a>
                                    <a href="" class="BlurrCover" data-bs-toggle="modal"
                                        data-bs-target="#BusinessPhotosModal">
                                        <div class="BlurrCoverData">
                                            <p>+ 10</p>
                                        </div>
                                        <img src="https://img.freepik.com/free-photo/green-blue-holi-color-powder-crowd_23-2148129315.jpg?t=st=1731407223~exp=1731410823~hmac=38dd34eb6b370798b180a31014e9d25d2e438d6d5b09c4b82e79e3d79448f403&w=1380"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- My Delete Product Modal -->
        <div class="modal fade CustomModal" id="DeleteProductModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="InfoText">Do you really want your Product to be deleted? It cannot be undone once
                            deleted.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- My Service Details Modal -->
        <div class="modal fade CustomModal" id="ServiceDetailsModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Service Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row PromotionDetail">
                            <div class="col-md-8 col-sm-12 PromotionImg position-relative">
                                <img class="w-100" src="../assets/images/ImageBack2.jpg" alt="">
                                <div class="ProductIconContainer">
                                    <a href="">
                                        <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#DeleteServiceModal">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 PromotionData">
                                <img class="OwnerImg"
                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&amp;w=1887&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    alt="">
                                <p class="TitleText">Service Name</p>
                                <p class="OwnerText"><b>Price:</b></p>
                                <ul>
                                    <li>Tag Item</li>
                                    <li>Tag Item</li>
                                    <li>Tag</li>
                                    <li>Tag Item</li>
                                    <li>Tag Item</li>
                                </ul>
                            </div>
                            <div class="col-md-12 col-sm-12 PromotionData">
                                <p class="BodyText">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod
                                    molestias nihil
                                    vero
                                    quisquam
                                    assumenda. Consequuntur fuga veritatis quasi voluptates eum soluta ea quos eaque,
                                    hic possimus
                                    ipsum? Dicta, quisquam natus. Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Cumque
                                    iusto
                                    autem rerum quibusdam pariatur saepe earum, laboriosam quam ab illo quod ad ut
                                    voluptatem.
                                    Consectetur, unde. Odit, beatae? Fugiat, magni. Lorem ipsum dolor sit, amet
                                    consectetur
                                    adipisicing
                                    elit. Nemo tempora delectus, officiis corrupti perspiciatis quam temporibus!
                                    Placeat,
                                    consectetur
                                    possimus ab accusantium itaque numquam ea. Dicta deserunt quae blanditiis eaque
                                    fuga. Lorem
                                    ipsum
                                    dolor sit amet, consectetur adipisicing elit. Voluptates perferendis illum earum
                                    tempore,
                                    voluptas,
                                    facilis ullam illo sed provident tenetur quod accusantium harum, numquam nam
                                    consectetur aut
                                    consequuntur sunt quaerat? Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Eaque
                                    aperiam
                                    in similique quibusdam, ex veniam. Ullam, minus! Sapiente suscipit pariatur eum
                                    aspernatur
                                    laudantium earum! Quaerat, molestias ullam! Dolorum, sit similique. Lorem ipsum
                                    dolor sit amet,
                                    consectetur adipisicing elit. Exercitationem odio iure corporis deleniti unde quo ab
                                    atque
                                    soluta
                                    quam porro commodi quae ut natus, in voluptates quia quod fugit sint.</p>
                            </div>
                            <div class="col-md-12 col-sm-12 PeopleContainer mt-2">
                                <div class="TopSection">
                                    <p>Photos</p>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="../assets/images/Icon6.png" alt="">
                                    </a>
                                </div>
                                <div class="EventPhotoContainer">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/blue-holi-color-explosion-young-woman-dancing_23-2148129343.jpg?t=st=1731406746~exp=1731410346~hmac=aac3004aa5f9db23dd6c266f0c5351a065f18d551f3da09872c50dc1851d2c1f&w=1380"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/close-up-people-dancing-yellow-explosion-holi-color_23-2148129155.jpg?t=st=1731406654~exp=1731410254~hmac=e14e090ddbf68f2d9247a7ccfa46a4342c248a318fa4268954954fcbed03faea&w=740"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/green-holi-color-powder-crowd_23-2148129312.jpg?t=st=1731406659~exp=1731410259~hmac=bbd9797f2b5a6ab957dc738298432651e61989de3a9a3dac15534dc439224e36&w=1380"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/group-people-enjoying-holi-color_23-2148129319.jpg?t=st=1731406297~exp=1731409897~hmac=acd19fe86608034c5d2c2cddd5ba441729d9c046cfd629ff77eec2bc60c8b980&w=1380"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/black-man-surrounded-by-orange-smoke_410324-20.jpg?t=st=1731406716~exp=1731410316~hmac=793484971ee67895250accc8aa03bf8873cdb16f98f451ed9751c18de6dee65d&w=740"
                                            alt="">
                                    </a>
                                    <a href="" class="BlurrCover" data-bs-toggle="modal"
                                        data-bs-target="#BusinessPhotosModal">
                                        <div class="BlurrCoverData">
                                            <p>+ 10</p>
                                        </div>
                                        <img src="https://img.freepik.com/free-photo/green-blue-holi-color-powder-crowd_23-2148129315.jpg?t=st=1731407223~exp=1731410823~hmac=38dd34eb6b370798b180a31014e9d25d2e438d6d5b09c4b82e79e3d79448f403&w=1380"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fav Service Details Modal -->
        <div class="modal fade CustomModal" id="FavServiceDetailsModal" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Service Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row PromotionDetail">
                            <div class="col-md-8 col-sm-12 PromotionImg position-relative">
                                <img class="w-100" src="../assets/images/ImageBack2.jpg" alt="">
                                <div class="ProductIconContainer">
                                    <a href="" class="QRBlock" data-bs-toggle="modal" data-bs-target="#BusinessQRModal">
                                        <img class="QRImg" src="../assets/images/Icon27.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 PromotionData">
                                <img class="OwnerImg"
                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&amp;w=1887&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    alt="">
                                <p class="TitleText">Service Name</p>
                                <p class="OwnerText"><b>Price:</b></p>
                                <ul>
                                    <li>Tag Item</li>
                                    <li>Tag Item</li>
                                    <li>Tag</li>
                                    <li>Tag Item</li>
                                    <li>Tag Item</li>
                                </ul>
                                <div class="QuantityAddBlock">
                                    <p class="m-0 QuantityTextHeading">Quantity</p>
                                    <div class="QuantityContainer">
                                        <a class="decrement">
                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                        </a>
                                        <span>
                                            <p class="m-0 QuantityCount counter">1</p>
                                        </span>
                                        <a class="increment">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="BtnContainer">
                                    <a class="BuyNowBtn">
                                        <p class="m-0">Buy Now</p>
                                    </a>
                                    <a class="AddToCartBtn AddToCartNotify">
                                        <img src="../assets/images/Icon25.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 PromotionData">
                                <p class="BodyText">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod
                                    molestias nihil
                                    vero
                                    quisquam
                                    assumenda. Consequuntur fuga veritatis quasi voluptates eum soluta ea quos eaque,
                                    hic possimus
                                    ipsum? Dicta, quisquam natus. Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Cumque
                                    iusto
                                    autem rerum quibusdam pariatur saepe earum, laboriosam quam ab illo quod ad ut
                                    voluptatem.
                                    Consectetur, unde. Odit, beatae? Fugiat, magni. Lorem ipsum dolor sit, amet
                                    consectetur
                                    adipisicing
                                    elit. Nemo tempora delectus, officiis corrupti perspiciatis quam temporibus!
                                    Placeat,
                                    consectetur
                                    possimus ab accusantium itaque numquam ea. Dicta deserunt quae blanditiis eaque
                                    fuga. Lorem
                                    ipsum
                                    dolor sit amet, consectetur adipisicing elit. Voluptates perferendis illum earum
                                    tempore,
                                    voluptas,
                                    facilis ullam illo sed provident tenetur quod accusantium harum, numquam nam
                                    consectetur aut
                                    consequuntur sunt quaerat? Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Eaque
                                    aperiam
                                    in similique quibusdam, ex veniam. Ullam, minus! Sapiente suscipit pariatur eum
                                    aspernatur
                                    laudantium earum! Quaerat, molestias ullam! Dolorum, sit similique. Lorem ipsum
                                    dolor sit amet,
                                    consectetur adipisicing elit. Exercitationem odio iure corporis deleniti unde quo ab
                                    atque
                                    soluta
                                    quam porro commodi quae ut natus, in voluptates quia quod fugit sint.</p>
                            </div>
                            <div class="col-md-12 col-sm-12 PeopleContainer mt-2">
                                <div class="TopSection">
                                    <p>Photos</p>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="../assets/images/Icon6.png" alt="">
                                    </a>
                                </div>
                                <div class="EventPhotoContainer">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/blue-holi-color-explosion-young-woman-dancing_23-2148129343.jpg?t=st=1731406746~exp=1731410346~hmac=aac3004aa5f9db23dd6c266f0c5351a065f18d551f3da09872c50dc1851d2c1f&w=1380"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/close-up-people-dancing-yellow-explosion-holi-color_23-2148129155.jpg?t=st=1731406654~exp=1731410254~hmac=e14e090ddbf68f2d9247a7ccfa46a4342c248a318fa4268954954fcbed03faea&w=740"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/green-holi-color-powder-crowd_23-2148129312.jpg?t=st=1731406659~exp=1731410259~hmac=bbd9797f2b5a6ab957dc738298432651e61989de3a9a3dac15534dc439224e36&w=1380"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/group-people-enjoying-holi-color_23-2148129319.jpg?t=st=1731406297~exp=1731409897~hmac=acd19fe86608034c5d2c2cddd5ba441729d9c046cfd629ff77eec2bc60c8b980&w=1380"
                                            alt="">
                                    </a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#BusinessPhotosModal">
                                        <img src="https://img.freepik.com/free-photo/black-man-surrounded-by-orange-smoke_410324-20.jpg?t=st=1731406716~exp=1731410316~hmac=793484971ee67895250accc8aa03bf8873cdb16f98f451ed9751c18de6dee65d&w=740"
                                            alt="">
                                    </a>
                                    <a href="" class="BlurrCover" data-bs-toggle="modal"
                                        data-bs-target="#BusinessPhotosModal">
                                        <div class="BlurrCoverData">
                                            <p>+ 10</p>
                                        </div>
                                        <img src="https://img.freepik.com/free-photo/green-blue-holi-color-powder-crowd_23-2148129315.jpg?t=st=1731407223~exp=1731410823~hmac=38dd34eb6b370798b180a31014e9d25d2e438d6d5b09c4b82e79e3d79448f403&w=1380"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- My Delete Service Modal -->
        <div class="modal fade CustomModal" id="DeleteServiceModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Service</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="InfoText">Do you really want your Service to be deleted? It cannot be undone once
                            deleted.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Business Invited Modal -->
        <div class="modal fade CustomModal" id="BusinessInvitedModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Invitations</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row m-0 InvitedPeopleTab">
                            <div class="col-md-12 col-sm-12">
                                <!-- Tabs Navigation -->
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="All-Tab1" data-bs-toggle="tab"
                                            data-bs-target="#AllTab1" type="button" role="tab" aria-controls="AllTab"
                                            aria-selected="true">All</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="InvitedPeople-Tab1" data-bs-toggle="tab"
                                            data-bs-target="#InvitedPeopleTab1" type="button" role="tab"
                                            aria-controls="profile" aria-selected="false">Invited People</button>
                                    </li>
                                </ul>

                                <input class="form-control mt-4 mb-4 SearchBarInner" type="search" placeholder="Search"
                                    aria-label="Search">

                                <!-- Tabs Content -->
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="AllTab1" role="tabpanel"
                                        aria-labelledby="All-Tab1">
                                        <div class="row m-0 AllContain">
                                            <div class="col-lg-4 col-md-4 ps-0 mb-4">
                                                <div class="AllContainBlock">
                                                    <div class="Data">
                                                        <img src="https://img.freepik.com/free-photo/lifestyle-people-emotions-casual-concept-confident-nice-smiling-asian-woman-cross-arms-chest-confident-ready-help-listening-coworkers-taking-part-conversation_1258-59335.jpg?t=st=1732007716~exp=1732011316~hmac=527a23b0f4c953638aee7ed04c9d6e999ac4850c1076314be0e59f980fb455ed&w=1380"
                                                            alt="">
                                                        <p>User Name</p>
                                                    </div>
                                                    <a href="">
                                                        <img src="../assets/images/Icon7.png" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <div class="AllContainBlock">
                                                    <div class="Data">
                                                        <img src="https://img.freepik.com/free-photo/lifestyle-people-emotions-casual-concept-confident-nice-smiling-asian-woman-cross-arms-chest-confident-ready-help-listening-coworkers-taking-part-conversation_1258-59335.jpg?t=st=1732007716~exp=1732011316~hmac=527a23b0f4c953638aee7ed04c9d6e999ac4850c1076314be0e59f980fb455ed&w=1380"
                                                            alt="">
                                                        <p>User Name</p>
                                                    </div>
                                                    <a href="">
                                                        <img src="../assets/images/Icon7.png" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <div class="AllContainBlock">
                                                    <div class="Data">
                                                        <img src="https://img.freepik.com/free-photo/lifestyle-people-emotions-casual-concept-confident-nice-smiling-asian-woman-cross-arms-chest-confident-ready-help-listening-coworkers-taking-part-conversation_1258-59335.jpg?t=st=1732007716~exp=1732011316~hmac=527a23b0f4c953638aee7ed04c9d6e999ac4850c1076314be0e59f980fb455ed&w=1380"
                                                            alt="">
                                                        <p>User Name</p>
                                                    </div>
                                                    <a href="">
                                                        <img src="../assets/images/Icon7.png" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 ps-0">
                                                <div class="AllContainBlock">
                                                    <div class="Data">
                                                        <img src="https://img.freepik.com/free-photo/lifestyle-people-emotions-casual-concept-confident-nice-smiling-asian-woman-cross-arms-chest-confident-ready-help-listening-coworkers-taking-part-conversation_1258-59335.jpg?t=st=1732007716~exp=1732011316~hmac=527a23b0f4c953638aee7ed04c9d6e999ac4850c1076314be0e59f980fb455ed&w=1380"
                                                            alt="">
                                                        <p>User Name</p>
                                                    </div>
                                                    <a href="">
                                                        <img src="../assets/images/Icon7.png" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="InvitedPeopleTab1" role="tabpanel"
                                        aria-labelledby="InvitedPeople-Tab1">
                                        <div class="row m-0 InvitedContain">
                                            <div class="col-lg-4 col-md-4 ps-0">
                                                <div class="InvitedContainBlock">
                                                    <div class="Data">
                                                        <img src="https://img.freepik.com/free-photo/lifestyle-people-emotions-casual-concept-confident-nice-smiling-asian-woman-cross-arms-chest-confident-ready-help-listening-coworkers-taking-part-conversation_1258-59335.jpg?t=st=1732007716~exp=1732011316~hmac=527a23b0f4c953638aee7ed04c9d6e999ac4850c1076314be0e59f980fb455ed&w=1380"
                                                            alt="">
                                                        <p>User Name</p>
                                                    </div>
                                                    <a href="">
                                                        Invited
                                                    </a>
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

        <!-- Business Invite People Modal -->
        <div class="modal fade CustomModal" id="BusinessInvitePeopleModal" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Invitations</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input class="form-control mb-4 SearchBarInner" type="search" placeholder="Search"
                            aria-label="Search">

                        <div class="row m-0 InvitedContain">
                            <div class="col-lg-4 col-md-4 ps-0 mb-4">
                                <div class="InvitedContainBlock">
                                    <div class="Data">
                                        <img src="https://img.freepik.com/free-photo/lifestyle-people-emotions-casual-concept-confident-nice-smiling-asian-woman-cross-arms-chest-confident-ready-help-listening-coworkers-taking-part-conversation_1258-59335.jpg?t=st=1732007716~exp=1732011316~hmac=527a23b0f4c953638aee7ed04c9d6e999ac4850c1076314be0e59f980fb455ed&w=1380"
                                            alt="">
                                        <p>User Name</p>
                                    </div>
                                    <a href="">
                                        Invited
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 mb-4">
                                <div class="InvitedContainBlock">
                                    <div class="Data">
                                        <img src="https://img.freepik.com/free-photo/lifestyle-people-emotions-casual-concept-confident-nice-smiling-asian-woman-cross-arms-chest-confident-ready-help-listening-coworkers-taking-part-conversation_1258-59335.jpg?t=st=1732007716~exp=1732011316~hmac=527a23b0f4c953638aee7ed04c9d6e999ac4850c1076314be0e59f980fb455ed&w=1380"
                                            alt="">
                                        <p>User Name</p>
                                    </div>
                                    <a href="">
                                        Invited
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 pe-0 mb-4">
                                <div class="InvitedContainBlock">
                                    <div class="Data">
                                        <img src="https://img.freepik.com/free-photo/lifestyle-people-emotions-casual-concept-confident-nice-smiling-asian-woman-cross-arms-chest-confident-ready-help-listening-coworkers-taking-part-conversation_1258-59335.jpg?t=st=1732007716~exp=1732011316~hmac=527a23b0f4c953638aee7ed04c9d6e999ac4850c1076314be0e59f980fb455ed&w=1380"
                                            alt="">
                                        <p>User Name</p>
                                    </div>
                                    <a href="">
                                        Invited
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 ps-0">
                                <div class="InvitedContainBlock">
                                    <div class="Data">
                                        <img src="https://img.freepik.com/free-photo/lifestyle-people-emotions-casual-concept-confident-nice-smiling-asian-woman-cross-arms-chest-confident-ready-help-listening-coworkers-taking-part-conversation_1258-59335.jpg?t=st=1732007716~exp=1732011316~hmac=527a23b0f4c953638aee7ed04c9d6e999ac4850c1076314be0e59f980fb455ed&w=1380"
                                            alt="">
                                        <p>User Name</p>
                                    </div>
                                    <a href="">
                                        Invited
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="InvitedContainBlock">
                                    <div class="Data">
                                        <img src="https://img.freepik.com/free-photo/lifestyle-people-emotions-casual-concept-confident-nice-smiling-asian-woman-cross-arms-chest-confident-ready-help-listening-coworkers-taking-part-conversation_1258-59335.jpg?t=st=1732007716~exp=1732011316~hmac=527a23b0f4c953638aee7ed04c9d6e999ac4850c1076314be0e59f980fb455ed&w=1380"
                                            alt="">
                                        <p>User Name</p>
                                    </div>
                                    <a href="">
                                        Invited
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Business QR Modal -->
        <div class="modal fade CustomModal" id="BusinessQRModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Scan QR code</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body AppearanceData">
                        <form class="row g-3">
                            <div class="col-lg-12 col-md-12 col-sm-12 QRBlock">
                                <p>Scan QR code</p>
                                <img class="BusinessQRImg" src="../assets/images/QRCode.png" alt="">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row m-0 TabBar">
            <div class="Pagination">
                <a href="" id="Home"><i class="fa fa-angle-left" aria-hidden="true"></i> Home / Business Management</a>
            </div>

            <div class="TabContainer">
                <div class="Tab active" onclick="openTab(event, 'MyBusiness')">My Business</div>
                <div class="Tab" onclick="openTab(event, 'FavoriteBusiness')">Favorite Business</div>
            </div>
        </div>

        <div id="MyBusiness" class="row m-0 TabContent active">
            <div class="Card col-lg-3 col-md-3 col-sm-6" data-bs-toggle="modal"
                data-bs-target="#DetailsMyBusinessModal">
                <div class="CardInner">
                    <div class="Cover"></div>
                    <p class="Heading">Business Name</p>
                    <p class="SubHeading">Location: </p>
                    <p class="SubHeading">Business Tag: </p>
                    <div class="IconContainer">
                        <a href="">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                        </a>
                        <a href="" data-bs-toggle="modal" data-bs-target="#EditBusinessModal">
                            <i class="fa fa-pencil-square" aria-hidden="true"></i>
                        </a>
                        <a href="" data-bs-toggle="modal" data-bs-target="#DeleteBusinessModal">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div id="FavoriteBusiness" class="row m-0 TabContent">
            <div class="Card col-lg-3 col-md-3 col-sm-6" data-bs-toggle="modal" data-bs-target="#FavBusinessModal">
                <div class="CardInner">
                    <div class="Cover"></div>
                    <p class="Heading">Business Name</p>
                    <p class="SubHeading">Location: </p>
                    <p class="SubHeading">Business Tag: </p>
                    <div class="IconContainer">
                        <a href="">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid m-0 Section Business BuyNowSection" style="display: none;">
        <div class="row m-0 TabBar">
            <div class="Pagination BuyNowSectionPagination">
                <a href="" id="Home">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                    Home / Cart Details
                </a>
            </div>

            <div class="row m-0 mt-3 CartContainer">
                <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                    <div class="col-lg-12 col-md-12">
                        <div class="CartProductBlock">
                            <img class="CartProductImg" src="../assets/images/ImageBack1.jpg" alt="">
                            <div class="CartProductDataBlock">
                                <div class="CartProductTextBlock">
                                    <p class="m-0 ProductName">Product Name</p>
                                    <p class="m-0 ProductPrice">Price</p>
                                </div>
                                <div class="CartProductCountBlock">
                                    <a href="">
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                    </a>
                                    <p class="m-0 CartCount">1</p>
                                    <a href="">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a class="CartDeleteBtn" href="">
                                    <img src="../assets/images/Icon28.png" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 mt-4">
                        <div class="CartProductBlock">
                            <img class="CartProductImg" src="../assets/images/ImageBack2.jpg" alt="">
                            <div class="CartProductDataBlock">
                                <div class="CartProductTextBlock">
                                    <p class="m-0 ProductName">Service Name</p>
                                    <p class="m-0 ProductPrice">Price</p>
                                </div>
                                <div class="CartProductCountBlock">
                                    <a href="">
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                    </a>
                                    <p class="m-0 CartCount">1</p>
                                    <a href="">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a class="CartDeleteBtn" href="">
                                    <img src="../assets/images/Icon28.png" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="CartPriceContainer">
                        <div class="CartPriceData">
                            <p class="m-0 Heading">Sub Total:</p>
                            <p class="m-0 Amount">Amount</p>
                        </div>
                        <a href="" class="CheckoutBtn">
                            <p class="m-0 CheckoutBtnText">Checkout</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid m-0 Section Network" style="display: none;">
        <div class="row m-0 TabBar">
            <div class="Pagination">
                <a href="" id="Home"><i class="fa fa-angle-left" aria-hidden="true"></i> Home / Network Management</a>
            </div>

            <div class="TabContainer">
                <div class="Tab active" onclick="openTab(event, 'AllMembers')">All Members</div>
                <div class="Tab" onclick="openTab(event, 'MyNetwork')">My Network A&E</div>
            </div>
        </div>

        <div id="AllMembers" class="row m-0 TabContent active">
            <div class="Card col-lg-4 col-md-4 col-sm-6 mt-3">
                <div class="NetworkCartBlock" id="NetworkProfile">
                    <div class="UserDetails">
                        <img src="../assets/images/User1.png" alt="">
                        <p class="Heading">User Name</p>
                    </div>
                    <div class="BtnDetails">
                        <div class="NameTag">
                            <p class="m-0">A & E</p>
                        </div>
                        <a href="" class="LikeBtn">
                            <img src="../assets/images/Icon29.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="Card col-lg-4 col-md-4 col-sm-6 mt-3">
                <div class="NetworkCartBlock">
                    <div class="UserDetails">
                        <img src="../assets/images/User1.png" alt="">
                        <p class="Heading">User Name</p>
                    </div>
                    <div class="BtnDetails">
                        <div class="NameTag">
                            <p class="m-0">A & E</p>
                        </div>
                        <a href="" class="LikeBtn">
                            <img src="../assets/images/Icon29.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="Card col-lg-4 col-md-4 col-sm-6 mt-3">
                <div class="NetworkCartBlock">
                    <div class="UserDetails">
                        <img src="../assets/images/User1.png" alt="">
                        <p class="Heading">User Name</p>
                    </div>
                    <div class="BtnDetails">
                        <div class="NameTag">
                            <p class="m-0">A & E</p>
                        </div>
                        <a href="" class="LikeBtn">
                            <img src="../assets/images/Icon29.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="Card col-lg-4 col-md-4 col-sm-6 mt-3">
                <div class="NetworkCartBlock">
                    <div class="UserDetails">
                        <img src="../assets/images/User1.png" alt="">
                        <p class="Heading">User Name</p>
                    </div>
                    <div class="BtnDetails">
                        <div class="NameTag">
                            <p class="m-0">A & E</p>
                        </div>
                        <a href="" class="LikeBtn">
                            <img src="../assets/images/Icon29.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div id="MyNetwork" class="row m-0 TabContent">
            <div class="Card col-lg-4 col-md-4 col-sm-6 mt-3">
                <div class="NetworkCartBlock" id="NetworkProfile">
                    <div class="UserDetails">
                        <img src="../assets/images/User1.png" alt="">
                        <p class="Heading">User Name</p>
                    </div>
                    <div class="BtnDetails">
                        <div class="NameTag">
                            <p class="m-0">Service Provider</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="Card col-lg-4 col-md-4 col-sm-6 mt-3">
                <div class="NetworkCartBlock" id="NetworkProfile">
                    <div class="UserDetails">
                        <img src="../assets/images/User1.png" alt="">
                        <p class="Heading">User Name</p>
                    </div>
                    <div class="BtnDetails">
                        <div class="NameTag">
                            <p class="m-0">Service Provider</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid m-0 Section NetworkProfile" style="display: none;">
        <!-- Advertise Modal -->
        <div class="modal fade CustomModal" id="AdvertiseModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Advertisement</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3 AddAdvertisement">
                            <div class="col-md-6 col-sm-12">
                                <label class="form-label">Title</label>
                                <input type="text" placeholder="Enter title">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label class="form-label">Upload File</label>
                                <input type="file" class="form-control" id="inputGroupFile01">
                            </div>
                        </form>

                        <form class="row g-3 AddAdvertisementPlan">
                            <div class="col-lg-12 col-md-12 col-sm-12 AddAdvertisementPlanContainer">
                                <div class="col-md-6 col-sm-12 pe-2">
                                    <div class="SubscriptionBlock">
                                        <div class="SubscriptionHeadingBlock">
                                            <h2>Subscription Heading</h2>
                                            <p class="m-0">$50/month</p>
                                        </div>
                                        <ul>
                                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores,
                                                voluptates.</li>
                                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores,
                                                voluptates.</li>
                                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores,
                                                voluptates.</li>
                                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores,
                                                voluptates.</li>
                                        </ul>
                                        <div class="SubscriptionBtnContainer">
                                            <a href="" class="SubscriptionBtn ChooseBtn">
                                                <p>Choose</p>
                                            </a>
                                            <a href="" class="AdvertisementLearnMoreBtn">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 ps-2 pe-2">
                                    <div class="SubscriptionBlock">
                                        <div class="SubscriptionHeadingBlock">
                                            <h2>Subscription Heading</h2>
                                            <p class="m-0">$50/month</p>
                                        </div>
                                        <ul>
                                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores,
                                                voluptates.</li>
                                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores,
                                                voluptates.</li>
                                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores,
                                                voluptates.</li>
                                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores,
                                                voluptates.</li>
                                        </ul>
                                        <div class="SubscriptionBtnContainer">
                                            <a href="" class="SubscriptionBtn ChooseBtn">
                                                <p>Choose</p>
                                            </a>
                                            <a href="" class="AdvertisementLearnMoreBtn">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 ps-2">
                                    <div class="SubscriptionBlock">
                                        <div class="SubscriptionHeadingBlock">
                                            <h2>Subscription Heading</h2>
                                            <p class="m-0">$50/month</p>
                                        </div>
                                        <ul>
                                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores,
                                                voluptates.</li>
                                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores,
                                                voluptates.</li>
                                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores,
                                                voluptates.</li>
                                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores,
                                                voluptates.</li>
                                        </ul>
                                        <div class="SubscriptionBtnContainer">
                                            <a href="" class="SubscriptionBtn ChooseBtn">
                                                <p>Choose</p>
                                            </a>
                                            <a href="" class="AdvertisementLearnMoreBtn">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <label class="form-label">Select Duration</label>
                                <select>
                                    <option selected disabled value="">Choose a category</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label class="form-label">Preferred Listing</label>
                                <select>
                                    <option selected disabled value="">Choose a category</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </form>

                        <form class="row g-3 AddAdvertisementPlanDetails">
                            <div class="col-md-12 col-sm-12">
                                <div class="m-0 row w-100 LearnMoreData" style="display: block;">
                                    <div class="col-lg-12 col-md-12 p-0">
                                        <div class="TransactionBlock">
                                            <div class="TransactionData">
                                                <img src="../assets/images/CompleteIcon.png" alt="">
                                                <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet,
                                                    consectetur adipisicing elit.
                                                </p>
                                            </div>
                                            <div class="TransactionAmount">
                                                <p class="m-0">Yes</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 p-0">
                                        <div class="TransactionBlock">
                                            <div class="TransactionData">
                                                <img src="../assets/images/CompleteIcon.png" alt="">
                                                <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet,
                                                    consectetur adipisicing elit.
                                                </p>
                                            </div>
                                            <div class="TransactionAmount">
                                                <p class="m-0">Yes</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 p-0">
                                        <div class="TransactionBlock">
                                            <div class="TransactionData">
                                                <img src="../assets/images/CompleteIcon.png" alt="">
                                                <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet,
                                                    consectetur adipisicing elit.
                                                </p>
                                            </div>
                                            <div class="TransactionAmount">
                                                <p class="m-0 VipText">VIP Access</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 p-0">
                                        <div class="TransactionBlock">
                                            <div class="TransactionData">
                                                <img src="../assets/images/CompleteIcon.png" alt="">
                                                <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet,
                                                    consectetur adipisicing elit.
                                                </p>
                                            </div>
                                            <div class="TransactionAmount">
                                                <p class="m-0 VipText">Top Presence</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 p-0">
                                        <div class="TransactionBlock">
                                            <div class="TransactionData">
                                                <img src="../assets/images/CompleteIcon.png" alt="">
                                                <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet,
                                                    consectetur adipisicing elit.
                                                </p>
                                            </div>
                                            <div class="TransactionAmount">
                                                <p class="m-0">Yes</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 p-0">
                                        <div class="TransactionBlock">
                                            <div class="TransactionData">
                                                <img src="../assets/images/CompleteIcon.png" alt="">
                                                <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet,
                                                    consectetur adipisicing elit.
                                                </p>
                                            </div>
                                            <div class="TransactionAmount">
                                                <p class="m-0">Yes</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 p-0">
                                        <div class="TransactionBlock">
                                            <div class="TransactionData">
                                                <img src="../assets/images/CompleteIcon.png" alt="">
                                                <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet,
                                                    consectetur adipisicing elit.
                                                </p>
                                            </div>
                                            <div class="TransactionAmount">
                                                <p class="m-0">Yes</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="AddAdvertisementFooter">
                            <button type="button" class="btn btn-primary SelectPlanBtn">Select Promotion Plan</button>
                        </div>

                        <div class="AddAdvertisementPlanFooter">
                            <button type="button" class="btn btn-primary SelectPlanDetailsBtnBack">Back</button>
                            <button type="button" class="btn btn-primary SelectPlanDetailsBtn">Pay & Post
                                Promotion</button>
                        </div>

                        <div class="AddAdvertisementPlanDetailsFooter">
                            <button type="button" class="btn btn-primary SelectPlanWholeDetailsBtnBack">Back</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row m-0 TabBar">
            <div class="TabBar">
                <div class="Pagination">
                    <a href="" id="Home"><i class="fa fa-angle-left" aria-hidden="true"></i> Home / Profile</a>
                </div>

                <div class="row m-0" style="background: #fff;">
                    <div class="col-lg-9 col-md-9 col-sm-12 UserProfileDataContainer">
                        <img class="AddBanner" src="../assets/images/AddBaner.png" alt="">
                        <a href="" class="LikeBtnBlock">
                            <img src="../assets/images/Icon29.png" alt="">
                        </a>
                        <img class="UserProfileImg" src="../assets/images/User1.png" alt="">
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 UserDataContainer">
                        <div>
                            <p class="m-0 UserName">User Name</p>
                            <p class="m-0 UserNameTag">ATHLETE & ENTERTAINER</p>
                        </div>
                        <a href="" class="UserAddBtn" data-bs-toggle="modal" data-bs-target="#AdvertiseModal">
                            <p class="m-0">Advertise</p>
                        </a>
                    </div>
                </div>

                <div class="TabContainer">
                    <div class="Tab active" onclick="openTab(event, 'Info')">Info</div>
                    <div class="Tab" onclick="openTab(event, 'Photos')">Photos</div>
                    <div class="Tab" onclick="openTab(event, 'Events')">Events</div>
                </div>
            </div>

            <div id="Info" class="row m-0 TabContent active">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="ProfileDataBlock">
                        <p class="m-0 HeadingText">About me</p>
                        <p class="m-0 SubHeadingText">It sounds like you have experiences related to computer companies
                            and
                            interests in computers. Perhaps you've worked in the tech industry, whether in software
                            development, IT
                            support, or another role.</p>
                    </div>
                    <div class="ProfileDataBlock">
                        <p class="m-0 HeadingText">Basic info</p>
                        <p class="m-0 SubHeadingText">Birthday: 15th July 1991</p>
                    </div>
                    <div class="ProfileDataBlock">
                        <p class="m-0 HeadingText">Interest</p>
                        <ul>
                            <li>Tag Item</li>
                            <li>Tag Item</li>
                            <li>Tag Item</li>
                            <li>Tag Item</li>
                            <li>Tag Item</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div id="Photos" class="row m-0 TabContent">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="EventPhotoContainer">
                        <a href="">
                            <img src="https://img.freepik.com/free-photo/blue-holi-color-explosion-young-woman-dancing_23-2148129343.jpg?t=st=1731406746~exp=1731410346~hmac=aac3004aa5f9db23dd6c266f0c5351a065f18d551f3da09872c50dc1851d2c1f&amp;w=1380"
                                alt="">
                        </a>
                        <a href="">
                            <img src="https://img.freepik.com/free-photo/close-up-people-dancing-yellow-explosion-holi-color_23-2148129155.jpg?t=st=1731406654~exp=1731410254~hmac=e14e090ddbf68f2d9247a7ccfa46a4342c248a318fa4268954954fcbed03faea&amp;w=740"
                                alt="">
                        </a>
                        <a href="">
                            <img src="https://img.freepik.com/free-photo/green-holi-color-powder-crowd_23-2148129312.jpg?t=st=1731406659~exp=1731410259~hmac=bbd9797f2b5a6ab957dc738298432651e61989de3a9a3dac15534dc439224e36&amp;w=1380"
                                alt="">
                        </a>
                        <a href="">
                            <img src="https://img.freepik.com/free-photo/group-people-enjoying-holi-color_23-2148129319.jpg?t=st=1731406297~exp=1731409897~hmac=acd19fe86608034c5d2c2cddd5ba441729d9c046cfd629ff77eec2bc60c8b980&amp;w=1380"
                                alt="">
                        </a>
                        <a href="">
                            <img src="https://img.freepik.com/free-photo/black-man-surrounded-by-orange-smoke_410324-20.jpg?t=st=1731406716~exp=1731410316~hmac=793484971ee67895250accc8aa03bf8873cdb16f98f451ed9751c18de6dee65d&amp;w=740"
                                alt="">
                        </a>
                        <a href="">
                            <img src="https://img.freepik.com/free-photo/green-blue-holi-color-powder-crowd_23-2148129315.jpg?t=st=1731407223~exp=1731410823~hmac=38dd34eb6b370798b180a31014e9d25d2e438d6d5b09c4b82e79e3d79448f403&amp;w=1380"
                                alt="">
                        </a>
                    </div>
                </div>
            </div>

            <div id="Events" class="row m-0 TabContent">
                <div class="Card col-lg-3 col-md-3 col-sm-6">
                    <div class="CardInner">
                        <div class="Cover"></div>
                        <img class="UserImage"
                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&amp;w=1887&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="">
                        <p class="Heading">Event Name</p>
                        <p class="SubHeading">Event Organizer Name</p>
                        <p class="SubHeading">Location: </p>
                        <p class="SubHeading">Date: </p>
                        <p class="SubHeading">Time: </p>
                        <div class="IconContainer">
                            <a href="">
                                <i class="fa fa-heart" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid m-0 Section Subscription" style="display: none;">
        <!-- Subscription History Button -->
        <button type="button" class="AddButton" data-bs-toggle="modal" data-bs-target="#SubscriptionHistoryModal">
            <p>Subscription History</p>
        </button>

        <!-- Subscription History Modal -->
        <div class="modal fade CustomModal" id="SubscriptionHistoryModal" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Subscription History</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row m-0">
                            <div class="col-lg-4 col-md-4 ps-0 mb-4">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <div class="TransactionTextdata">
                                            <p class="m-0">Payment order #1234</p>
                                            <p class="m-0">Date</p>
                                            <p class="m-0">Success</p>
                                        </div>
                                    </div>
                                    <p class="TransactionAmount">$100</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 mb-4">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <div class="TransactionTextdata">
                                            <p class="m-0">Payment order #1234</p>
                                            <p class="m-0">Date</p>
                                            <p class="m-0">Success</p>
                                        </div>
                                    </div>
                                    <p class="TransactionAmount">$100</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 pe-0 mb-4">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <div class="TransactionTextdata">
                                            <p class="m-0">Payment order #1234</p>
                                            <p class="m-0">Date</p>
                                            <p class="m-0">Success</p>
                                        </div>
                                    </div>
                                    <p class="TransactionAmount">$100</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 ps-0">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/InCompleteIcon.png" alt="">
                                        <div class="TransactionTextdata">
                                            <p class="m-0">Payment order #1234</p>
                                            <p class="m-0">Date</p>
                                            <p class="m-0 Pending">Pending</p>
                                        </div>
                                    </div>
                                    <p class="TransactionAmount Red">$80</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row m-0 TabBar">
            <div class="Pagination">
                <a href="" id="Home"><i class="fa fa-angle-left" aria-hidden="true"></i> Home / Subscription
                    Management</a>
            </div>

            <div class="row m-0 mt-3">
                <div class="col-lg-3 col-md-3">
                    <div class="SubscriptionBlock">
                        <div class="SubscriptionHeadingBlock">
                            <h2>Subscription Heading</h2>
                            <p class="m-0">$50/month</p>
                        </div>
                        <ul>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, voluptates.</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, voluptates.</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, voluptates.</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, voluptates.</li>
                        </ul>
                        <div class="m-0 row w-100 LearnMoreData" data-content="1">
                            <div class="col-lg-12 col-md-12 p-0">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                        </p>
                                    </div>
                                    <div class="TransactionAmount">
                                        <p class="m-0">Yes</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 p-0">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                        </p>
                                    </div>
                                    <div class="TransactionAmount">
                                        <p class="m-0">Yes</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 p-0">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                        </p>
                                    </div>
                                    <div class="TransactionAmount">
                                        <p class="m-0 VipText">VIP Access</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 p-0">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                        </p>
                                    </div>
                                    <div class="TransactionAmount">
                                        <p class="m-0 VipText">Top Presence</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 p-0">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                        </p>
                                    </div>
                                    <div class="TransactionAmount">
                                        <p class="m-0">Yes</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 p-0">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                        </p>
                                    </div>
                                    <div class="TransactionAmount">
                                        <p class="m-0">Yes</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 p-0">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                        </p>
                                    </div>
                                    <div class="TransactionAmount">
                                        <p class="m-0">Yes</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="SubscriptionBtnContainer">
                            <a href="" class="SubscriptionBtn">
                                <p>Active</p>
                            </a>
                            <a href="" class="LearnMoreBtn" data-target="1">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="SubscriptionBlock">
                        <div class="SubscriptionHeadingBlock">
                            <h2>Subscription Heading</h2>
                            <p class="m-0">$50/month</p>
                        </div>
                        <ul>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, voluptates.</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, voluptates.</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, voluptates.</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, voluptates.</li>
                        </ul>
                        <div class="m-0 row w-100 LearnMoreData" data-content="2">
                            <div class="col-lg-12 col-md-12 p-0">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                        </p>
                                    </div>
                                    <div class="TransactionAmount">
                                        <p class="m-0">Yes</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 p-0">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                        </p>
                                    </div>
                                    <div class="TransactionAmount">
                                        <p class="m-0">Yes</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 p-0">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                        </p>
                                    </div>
                                    <div class="TransactionAmount">
                                        <p class="m-0 VipText">VIP Access</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 p-0">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                        </p>
                                    </div>
                                    <div class="TransactionAmount">
                                        <p class="m-0 VipText">Top Presence</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 p-0">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                        </p>
                                    </div>
                                    <div class="TransactionAmount">
                                        <p class="m-0">Yes</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 p-0">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                        </p>
                                    </div>
                                    <div class="TransactionAmount">
                                        <p class="m-0">Yes</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 p-0">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                        </p>
                                    </div>
                                    <div class="TransactionAmount">
                                        <p class="m-0">Yes</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="SubscriptionBtnContainer">
                            <a href="" class="SubscriptionBtn ChooseBtn">
                                <p>Choose</p>
                            </a>
                            <a href="" class="LearnMoreBtn" data-target="2">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="SubscriptionBlock">
                        <div class="SubscriptionHeadingBlock">
                            <h2>Subscription Heading</h2>
                            <p class="m-0">$50/month</p>
                        </div>
                        <ul>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, voluptates.</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, voluptates.</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, voluptates.</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, voluptates.</li>
                        </ul>
                        <div class="m-0 row w-100 LearnMoreData" data-content="3">
                            <div class="col-lg-12 col-md-12 p-0">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                        </p>
                                    </div>
                                    <div class="TransactionAmount">
                                        <p class="m-0">Yes</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 p-0">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                        </p>
                                    </div>
                                    <div class="TransactionAmount">
                                        <p class="m-0">Yes</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 p-0">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                        </p>
                                    </div>
                                    <div class="TransactionAmount">
                                        <p class="m-0 VipText">VIP Access</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 p-0">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                        </p>
                                    </div>
                                    <div class="TransactionAmount">
                                        <p class="m-0 VipText">Top Presence</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 p-0">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                        </p>
                                    </div>
                                    <div class="TransactionAmount">
                                        <p class="m-0">Yes</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 p-0">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                        </p>
                                    </div>
                                    <div class="TransactionAmount">
                                        <p class="m-0">Yes</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 p-0">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                        </p>
                                    </div>
                                    <div class="TransactionAmount">
                                        <p class="m-0">Yes</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="SubscriptionBtnContainer">
                            <a href="" class="SubscriptionBtn ChooseBtn">
                                <p>Choose</p>
                            </a>
                            <a href="" class="LearnMoreBtn" data-target="3">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="SubscriptionBlock">
                        <div class="SubscriptionHeadingBlock">
                            <h2>Subscription Heading</h2>
                            <p class="m-0">$50/month</p>
                        </div>
                        <ul>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, voluptates.</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, voluptates.</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, voluptates.</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, voluptates.</li>
                        </ul>
                        <div class="m-0 row w-100 LearnMoreData" data-content="4">
                            <div class="col-lg-12 col-md-12 p-0">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                        </p>
                                    </div>
                                    <div class="TransactionAmount">
                                        <p class="m-0">Yes</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 p-0">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                        </p>
                                    </div>
                                    <div class="TransactionAmount">
                                        <p class="m-0">Yes</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 p-0">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                        </p>
                                    </div>
                                    <div class="TransactionAmount">
                                        <p class="m-0 VipText">VIP Access</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 p-0">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                        </p>
                                    </div>
                                    <div class="TransactionAmount">
                                        <p class="m-0 VipText">Top Presence</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 p-0">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                        </p>
                                    </div>
                                    <div class="TransactionAmount">
                                        <p class="m-0">Yes</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 p-0">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                        </p>
                                    </div>
                                    <div class="TransactionAmount">
                                        <p class="m-0">Yes</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 p-0">
                                <div class="TransactionBlock">
                                    <div class="TransactionData">
                                        <img src="../assets/images/CompleteIcon.png" alt="">
                                        <p class="m-0 TransactionTextdata">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                        </p>
                                    </div>
                                    <div class="TransactionAmount">
                                        <p class="m-0">Yes</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="SubscriptionBtnContainer">
                            <a href="" class="SubscriptionBtn ChooseBtn">
                                <p>Choose</p>
                            </a>
                            <a href="" class="LearnMoreBtn" data-target="4">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid m-0 Section ProfileTab" style="display: none;">
        <!-- Edit Profile Modal -->

        <div class="row m-0 TabBar">
            <div class="TabBar">
                <div class="Pagination">
                    <a href="" id="Home"><i class="fa fa-angle-left" aria-hidden="true"></i> Home / Profile</a>
                </div>

                <div class="row m-0" style="background: #fff;">
                    <div class="col-lg-9 col-md-9 col-sm-12 UserProfileDataContainer">
                        <img class="AddBanner" src="../assets/images/AddBaner.png" alt="">
                        <div class="ProfileImageContainer">
                            <img class="ProfileImage" src="../assets/images/User1.png" alt="">
                            <div class="ChangeImgBtnContainer">
                                <input type="file" class="ImgInputField">
                                <div class="ChangeImgBtnCover">
                                    <img src="../assets/images/Icon32.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 UserDataContainer">
                        <p class="m-0 UserName">User Name</p>
                        <div class="ProfileBtnContainer">
                            <a href="">
                                <img class="ProfileBtnImg" src="../assets/images/Icon30.png" alt="">
                                <p class="m-0 ProfileBtnText">Edit Profile</p>
                            </a>
                            <a href="">
                                <img class="ProfileBtnImg" src="../assets/images/Icon31.png" alt="">
                                <p class="m-0 ProfileBtnText">Change Password</p>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="TabContainer">
                    <div class="Tab active" onclick="openTab(event, 'ProfileInfo')">Info</div>
                    <div class="Tab" onclick="openTab(event, 'ProfilePhotos')">Photos</div>
                </div>
            </div>

            <div id="ProfileInfo" class="row m-0 TabContent active">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="ProfileDataBlock">
                        <p class="m-0 HeadingText">About me</p>
                        <p class="m-0 SubHeadingText">It sounds like you have experiences related to computer companies
                            and
                            interests in computers. Perhaps you've worked in the tech industry, whether in software
                            development, IT
                            support, or another role.</p>
                    </div>
                    <div class="ProfileDataBlock">
                        <p class="m-0 HeadingText">Basic info</p>
                        <p class="m-0 SubHeadingText mb-1"><b>Address:</b> 720 Liberty Ave, Staten Island, NY 10305, USA
                        </p>
                        <p class="m-0 SubHeadingText mb-1"><b>Phone:</b> +1 123-456-7890</p>
                        <p class="m-0 SubHeadingText mb-1"><b>Email:</b> email@gmail.com</p>
                        <p class="m-0 SubHeadingText mb-1"><b>Birthday:</b> 15th July 1991</p>
                    </div>
                    <div class="ProfileDataBlock">
                        <p class="m-0 HeadingText">Interest</p>
                        <ul>
                            <li>Tag Item</li>
                            <li>Tag Item</li>
                            <li>Tag Item</li>
                            <li>Tag Item</li>
                            <li>Tag Item</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div id="ProfilePhotos" class="row m-0 TabContent">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="EventPhotoContainer">
                        <a href="">
                            <img src="https://img.freepik.com/free-photo/blue-holi-color-explosion-young-woman-dancing_23-2148129343.jpg?t=st=1731406746~exp=1731410346~hmac=aac3004aa5f9db23dd6c266f0c5351a065f18d551f3da09872c50dc1851d2c1f&amp;w=1380"
                                alt="">
                        </a>
                        <a href="">
                            <img src="https://img.freepik.com/free-photo/close-up-people-dancing-yellow-explosion-holi-color_23-2148129155.jpg?t=st=1731406654~exp=1731410254~hmac=e14e090ddbf68f2d9247a7ccfa46a4342c248a318fa4268954954fcbed03faea&amp;w=740"
                                alt="">
                        </a>
                        <a href="">
                            <img src="https://img.freepik.com/free-photo/green-holi-color-powder-crowd_23-2148129312.jpg?t=st=1731406659~exp=1731410259~hmac=bbd9797f2b5a6ab957dc738298432651e61989de3a9a3dac15534dc439224e36&amp;w=1380"
                                alt="">
                        </a>
                        <a href="">
                            <img src="https://img.freepik.com/free-photo/group-people-enjoying-holi-color_23-2148129319.jpg?t=st=1731406297~exp=1731409897~hmac=acd19fe86608034c5d2c2cddd5ba441729d9c046cfd629ff77eec2bc60c8b980&amp;w=1380"
                                alt="">
                        </a>
                        <a href="">
                            <img src="https://img.freepik.com/free-photo/black-man-surrounded-by-orange-smoke_410324-20.jpg?t=st=1731406716~exp=1731410316~hmac=793484971ee67895250accc8aa03bf8873cdb16f98f451ed9751c18de6dee65d&amp;w=740"
                                alt="">
                        </a>
                        <a href="">
                            <img src="https://img.freepik.com/free-photo/green-blue-holi-color-powder-crowd_23-2148129315.jpg?t=st=1731407223~exp=1731410823~hmac=38dd34eb6b370798b180a31014e9d25d2e438d6d5b09c4b82e79e3d79448f403&amp;w=1380"
                                alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>