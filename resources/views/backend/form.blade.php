@extends('backend.layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.blade.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Form Page</li>
    </ol>

    <h2>Form controls</h2>
    <div class="row">
        <div class="col-12">
            <h1>Form</h1>
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.
                    </small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleSelect1">Example select</label>
                    <select class="form-control" id="exampleSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleSelect2">Example multiple select</label>
                    <select multiple class="form-control" id="exampleSelect2">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea">Example textarea</label>
                    <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                    <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for
                        the above input. It's a bit lighter and easily wraps to a new line.
                    </small>
                </div>
                <fieldset class="form-group">
                    <legend>Radio buttons</legend>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1"
                                   value="option1" checked>
                            Option one is this and that&mdash;be sure to include why it's great
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2"
                                   value="option2">
                            Option two can be something else and selecting it will deselect option one
                        </label>
                    </div>
                    <div class="form-check disabled">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios3"
                                   value="option3" disabled>
                            Option three is disabled
                        </label>
                    </div>
                </fieldset>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                        Check me out
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <h2>Textual inputs</h2>
    <div class="row">
        <div class="col-12">
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Text</label>
                <div class="col-10">
                    <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                </div>
            </div>
            <div class="form-group row">
                <label for="example-search-input" class="col-2 col-form-label">Search</label>
                <div class="col-10">
                    <input class="form-control" type="search" value="How do I shoot web" id="example-search-input">
                </div>
            </div>
            <div class="form-group row">
                <label for="example-email-input" class="col-2 col-form-label">Email</label>
                <div class="col-10">
                    <input class="form-control" type="email" value="bootstrap@example.com" id="example-email-input">
                </div>
            </div>
            <div class="form-group row">
                <label for="example-url-input" class="col-2 col-form-label">URL</label>
                <div class="col-10">
                    <input class="form-control" type="url" value="https://getbootstrap.com" id="example-url-input">
                </div>
            </div>
            <div class="form-group row">
                <label for="example-tel-input" class="col-2 col-form-label">Telephone</label>
                <div class="col-10">
                    <input class="form-control" type="tel" value="1-(555)-555-5555" id="example-tel-input">
                </div>
            </div>
            <div class="form-group row">
                <label for="example-password-input" class="col-2 col-form-label">Password</label>
                <div class="col-10">
                    <input class="form-control" type="password" value="hunter2" id="example-password-input">
                </div>
            </div>
            <div class="form-group row">
                <label for="example-number-input" class="col-2 col-form-label">Number</label>
                <div class="col-10">
                    <input class="form-control" type="number" value="42" id="example-number-input">
                </div>
            </div>
            <div class="form-group row">
                <label for="example-datetime-local-input" class="col-2 col-form-label">Date and time</label>
                <div class="col-10">
                    <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00"
                           id="example-datetime-local-input">
                </div>
            </div>
            <div class="form-group row">
                <label for="example-date-input" class="col-2 col-form-label">Date</label>
                <div class="col-10">
                    <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                </div>
            </div>
            <div class="form-group row">
                <label for="example-month-input" class="col-2 col-form-label">Month</label>
                <div class="col-10">
                    <input class="form-control" type="month" value="2011-08" id="example-month-input">
                </div>
            </div>
            <div class="form-group row">
                <label for="example-week-input" class="col-2 col-form-label">Week</label>
                <div class="col-10">
                    <input class="form-control" type="week" value="2011-W33" id="example-week-input">
                </div>
            </div>
            <div class="form-group row">
                <label for="example-time-input" class="col-2 col-form-label">Time</label>
                <div class="col-10">
                    <input class="form-control" type="time" value="13:45:00" id="example-time-input">
                </div>
            </div>
            <div class="form-group row">
                <label for="example-color-input" class="col-2 col-form-label">Color</label>
                <div class="col-10">
                    <input class="form-control" type="color" value="#563d7c" id="example-color-input">
                </div>
            </div>
        </div>
    </div>

    <h2>Form groups</h2>
    <div class="row">
        <div class="col-12">
            <form>
                <div class="form-group">
                    <label for="formGroupExampleInput">Example label</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Another label</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                </div>
            </form>
        </div>
    </div>
    <h2>Inline forms</h2>
    <div class="row">
        <div class="col-12">
            <form class="form-inline">
                <label class="sr-only" for="inlineFormInput">Name</label>
                <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput"
                       placeholder="Jane Doe">

                <label class="sr-only" for="inlineFormInputGroup">Username</label>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon">@</div>
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username">
                </div>

                <div class="form-check mb-2 mr-sm-2 mb-sm-0">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox"> Remember me
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <form class="form-inline">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Preference</label>
                <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect">
                    <option selected>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>

                <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                    <input type="checkbox" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Remember my preference</span>
                </label>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <h2>Using the Grid</h2>
    <div class="row">
        <div class="col-12">
            <div class="container">
                <form>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                        </div>
                    </div>
                    <fieldset class="form-group row">
                        <legend class="col-form-legend col-sm-2">Radios</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1"
                                           value="option1" checked>
                                    Option one is this and that&mdash;be sure to include why it's great
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2"
                                           value="option2">
                                    Option two can be something else and selecting it will deselect option one
                                </label>
                            </div>
                            <div class="form-check disabled">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3"
                                           value="option3" disabled>
                                    Option three is disabled
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group row">
                        <label class="col-sm-2">Checkbox</label>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox"> Check me out
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection