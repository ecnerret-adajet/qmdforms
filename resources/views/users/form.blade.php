                        <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                            <div class="col-md-offset-2 col-md-8">
                                 <input name="avatar" type="file" class="filestyle" data-size="sm" data-buttonName="btn-primary" data-buttonBefore="true">

                                @if ($errors->has('avatar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                {!! Form::text('name', null,  ['class' => 'form-control']) !!}  

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                            {!! Form::text('email', null,  [ 'type' => 'email', 'class' => 'form-control']) !!}  

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                            <label for="position" class="col-md-4 control-label">Position</label>

                            <div class="col-md-6">
                                {!! Form::text('position', null,  ['class' => 'form-control']) !!}  

                                @if ($errors->has('position'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                         <div class="form-group{{ $errors->has('department_list') ? ' has-error' : '' }}">
                            <label for="department_list" class="col-md-4 control-label">Department</label>

                            <div class="col-md-6">
                                {!! Form::select('department_list[]',  $departments, null,  ['class' => 'form-control', 'placeholder' => '--Select Department --']) !!}  

                                @if ($errors->has('department_list'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department_list') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('company_list') ? ' has-error' : '' }}">
                            <label for="company_list" class="col-md-4 control-label">Company</label>

                            <div class="col-md-6">
                                {!! Form::select('company_list[]',  $companies, null,  ['class' => 'form-control', 'placeholder' => '--Select Department --']) !!}  

                                @if ($errors->has('company_list'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company_list') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('roles_list') ? ' has-error' : '' }}">
                            <label for="roles" class="col-md-4 control-label">Roles</label>

                            <div class="col-md-6">
                                {!! Form::select('roles_list[]',  $roles,$userRole,  ['class' => 'form-control', 'multiple']) !!}  

                                @if ($errors->has('roles_list'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('roles_list') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>