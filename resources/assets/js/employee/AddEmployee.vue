<template>
	<div class="">
		<form class="form-horizontal" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
			<div class="row">
				<div class="col-sm-6">

					<!-- Employee First Name -->
					<div :class="{'form-group': true, 'has-error': form.errors.has('employee_fname')}">
						<label for="employee_fname" class="col-sm-4 control-label">
							First fname
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<input v-model="form.employee_fname" type="text" class="form-control" fname="employee_fname" id="employee_fname" placeholder="First Name">

							<span v-if="form.errors.has('employee_fname')" class="help-block">
								<strong v-text="form.errors.get('employee_fname')"></strong>
							</span>
						</div>
					</div>	
					<!-- Employee last Name -->
					<div :class="{'form-group': true, 'has-error': form.errors.has('employee_lname')}">
						<label for="employee_lname" class="col-sm-4 control-label">
							Last lname
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<input v-model="form.employee_lname" type="text" class="form-control" lname="employee_lname" id="employee_lname" placeholder="Last Name">

							<span v-if="form.errors.has('employee_lname')" class="help-block">
								<strong v-text="form.errors.get('employee_lname')"></strong>
							</span>
						</div>
					</div>	
					<!-- Employee Email -->
					<div :class="{ 'form-group': true, 'has-error': form.errors.has('employee_email') }">
						<label for="employee_email" class="col-sm-4 control-label">
							Employee Email
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<input type="email" v-model="form.employee_email" class="form-control" name="employee_email" id="employee_email" placeholder="Employee Email">

							<span v-if="form.errors.has('employee_email')" class="help-block">
								<strong v-text="form.errors.get('employee_email')"></strong>
							</span>
						</div>
					</div>

					<!-- Employee Phone -->
					<div :class="{ 'form-group': true, 'has-error': form.errors.has('employee_phone') }">
						<label for="employee_phone" class="col-sm-4 control-label">
							Employee Phone
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<input type="tel" v-model="form.employee_phone" class="form-control" name="employee_phone" id="employee_phone" placeholder="Employee Phone">

							<span v-if="form.errors.has('employee_phone')" class="help-block">
								<strong v-text="form.errors.get('employee_phone')"></strong>
							</span>
						</div>
					</div>
						<!-- Employee Gender -->
					<div :class="{ 'form-group': true, 'has-error': form.errors.has('employee_gender') }">
						<label for="employee_gender" class="col-sm-4 control-label">
							Gender
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<select type="text" v-model="form.employee_gender" class="form-control" name="employee_gender" id="employee_gender">
							    <option value="">Select Gender</option>
							    <option>Male</option>
								<option>Female</option>
							</select>	

							<span v-if="form.errors.has('employee_gender')" class="help-block">
								<strong v-text="form.errors.get('employee_gender')"></strong>
							</span>
						</div>
					</div>
				</div>

				<div class="col-sm-6">
					<!-- National ID -->
					<div :class="{ 'form-group': true, 'has-error': form.errors.has('employee_nid') }">
						<label for="employee_nid" class="col-sm-4 control-label">
							National ID
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<input type="text" v-model="form.employee_nid" class="form-control" name="employee_nid" id="employee_nid" placeholder="NID">

							<span v-if="form.errors.has('employee_nid')" class="help-block">
								<strong v-text="form.errors.get('employee_nid')"></strong>
							</span>
						</div>
					</div>
					<!-- Birth Day -->
					<div :class="{ 'form-group': true, 'has-error': form.errors.has('employee_birthday') }">
						<label for="employee_birthday" class="col-sm-4 control-label">
							Date of Birth
						</label>

						<div class="col-sm-8">
							<input type="date" v-model="form.employee_birthday" class="form-control" name="employee_birthday" id="employee_birthday" placeholder="00-00-0000">

							<span v-if="form.errors.has('employee_birthday')" class="help-block">
								<strong v-text="form.errors.get('employee_birthday')"></strong>
							</span>
						</div>
					</div>

					<!-- Address -->
					<div class="form-group">
						<label for="employee_address" class="col-sm-4 control-label">
						Employee Address
						</label>

						<div class="col-sm-8">
							<textarea id="employee_address" v-model="form.employee_address" name="employee_address" class="form-control" rows="3" placeholder="Enter ..."></textarea>
						</div>
					</div>

				<!-- Salary -->
				<div :class="{ 'form-group': true, 'has-error': form.errors.has('employee_salary') }">
					<label for="employee_salary" class="col-sm-4 control-label">
						Salary
					</label>

					<div class="col-sm-8">
						<input type="number" step="any" v-model="form.employee_salary" class="form-control" name="employee_salary" id="employee_salary" placeholder="Salary">

						<span v-if="form.errors.has('employee_salary')" class="help-block">
							<strong v-text="form.errors.get('employee_salary')"></strong>
						</span>
					</div>
				</div>
			</div>
		</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-4">
							<button :disabled="form.errors.any()" type="submit" class="btn btn-info">Save</button>
						</div>
					</div>
				</div>
				<div class="col-sm-6"></div>				
			</div>			
		</form>		
	</div>
</template>

<script>
	export default{

		data() {
			return {
				form: new Form({
					employee_fname: '',
					employee_lname: '',
					employee_email: '',
					employee_phone: '',
					employee_gender: '',
					employee_nid: '',
					employee_birthday: '',
					employee_address: '',
					employee_salary: '',
				})
			}
		},

		methods: {
			onSubmit() {
				this.form
				.post('/employee')
				.then(status => this.status());
			},

			status() {
				flash('Employee added.');
			}
		}
	}
</script>