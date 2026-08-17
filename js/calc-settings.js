Vue.component('pricing-calc', {
    template: `
        <div class="w-full sm:w-2/3 sm:mx-1/6 lg:w-1/2 lg:mx-1/4">

            <div class="w-full flex flex-col relative">
                <span class="lg:absolute lg:-left-16 lg:top-0 text-2xl text-brand-medium font-title">1.</span>
                <p class="leading-loose">How many employees <span class="underline">at any one time</span> do you have working in your warehouse performing tasks such as receiving, put-away, moving, counting and picking stock?</p>
                
                <div class="flex flex-row mt-8">
                    <p class="w-1/2 uppercase font-calculator text-base xl:text-xl text-brand-medium">{{total_employees}} Employee(s)</p>
                    <input @keyup="calculateUpfront(); calculateMonthly(); calculateMonthlyFinanced(); populateForm(); buttonState();" @change="calculateUpfront(); calculateMonthly(); calculateMonthlyFinanced(); populateForm(); buttonState();" class="w-1/2 rounded text-grey-dim border-none ring-grey-dim ring-2 focus:ring-2 focus:ring-brand-medium focus:placeholder-brand-medium" required type="number" min="1" v-model="total_employees" placeholder="# of employees ... (min 1)">
                </div>
                
            </div>

            <div class="flex flex-col w-full mt-12 relative">
                <span class="lg:absolute lg:-left-16 lg:top-0 text-2xl text-brand-medium font-title">2.</span>
                <p class="leading-loose">Pulsar requires a server. Would you like Pulsar WMS to provide a secure cloud server, or would you like to provide your own server?</p>

                <div class="flex flex-row w-full mt-8">
                    <label for="cloud" class="flex flex-row items-center w-1/2 text-base xl:text-xl uppercase text-grey-dim cursor-pointer">
                        <input @change="calculateUpfront(); calculateMonthly(); calculateMonthlyFinanced(); populateForm();" class="cursor-pointer w-4 h-4 xl:w-6 xl:h-6 appearance-none border-2 border-grey-medium checked:bg-brand-medium checked:border-transparent focus:ring-transparent checked:bg-none" type="radio" id="cloud" value="1" v-model="cloud" checked>
                        <span class="ml-2 xl:ml-4 font-calculator">Cloud please</span>
                    </label>
                    <label for="nocloud" class="flex flex-row items-center w-1/2 text-base xl:text-xl uppercase text-grey-dim cursor-pointer">
                        <input @change="calculateUpfront(); calculateMonthly(); calculateMonthlyFinanced(); populateForm();" class="cursor-pointer w-4 h-4 xl:w-6 xl:h-6 appearance-none border-2 border-grey-medium checked:bg-brand-medium checked:border-transparent focus:ring-transparent checked:bg-none" type="radio" id="nocloud" value="0" v-model="cloud">
                        <span class="ml-2 xl:ml-4 font-calculator">No cloud</span>
                    </label>
                </div>
            </div>

            <div class="flex flex-col w-full mt-12 relative">
                <span class="lg:absolute lg:-left-16 lg:top-0 text-2xl text-brand-medium font-title">3.</span>
                <p class="leading-loose">Each of the <span class="border-grey-dark border-b-2 inline-flex flex-row justify-center min-w-6 w-auto leading-snug ">{{total_employees}}</span> employees working in your warehouse will require a mobile computer. Would you like industrial mobile computers included in the estimate?</p>

                <div class="flex flex-row w-full mt-8">
                    <label for="hardware" class="flex flex-row items-center w-1/2 text-base xl:text-xl uppercase text-grey-dim cursor-pointer">
                        <input @change="calculateUpfront(); calculateMonthly(); calculateMonthlyFinanced(); populateForm();" class="cursor-pointer w-4 h-4 xl:w-6 xl:h-6 appearance-none border-2 border-grey-medium checked:bg-brand-medium checked:border-transparent focus:ring-transparent checked:bg-none" type="radio" id="hardware" value="1" v-model="hardware">
                        <span class="ml-2 xl:ml-4 font-calculator">Yes</span>
                    </label>
                    <label for="nohardware" class="flex flex-row items-center w-1/2 text-base xl:text-xl uppercase text-grey-dim cursor-pointer">
                        <input @change="calculateUpfront(); calculateMonthly(); calculateMonthlyFinanced(); populateForm();" class="cursor-pointer w-4 h-4 xl:w-6 xl:h-6 appearance-none border-2 border-grey-medium checked:bg-brand-medium checked:border-transparent focus:ring-transparent checked:bg-none" type="radio" id="nohardware" value="0" v-model="hardware">
                        <span class="ml-2 xl:ml-4 font-calculator">No</span>
                    </label>
                </div>
            </div>

            <div class="flex flex-col items-center justify-center w-full mt-24">
                <button :disabled="buttonDisabled" :class="[buttonDisabled ? 'button solid disabled font-calculator' : 'button font-calculator']" @click="calcReveal = !calcReveal; calculateUpfront(); calculateMonthly(); calculateMonthlyFinanced(); populateForm(); revealForm(); buttonState();">Calculate</button>
                <p class="leading-loose mt-4 text-xs">By clicking "Calculate" you agree to our <a class="text-brand-medium" href="#" target="_blank">TOS</a> and <a class="text-brand-medium" href="#" target="_blank">Privacy Policy</a></p>
            </div>

            <div :class="[!calcReveal ? 'hidden' : '']" class="w-full flex flex-col items-center justify-center mt-12">
                <div class="flex flex-col w-full lg:w-3/4 2xl:w-full items-center justify-center my-2">
                    <h2 class="mt-4 text-xl xl:text-2xl 2xl:text-4xl uppercase">Your estimate:</h2>
                    <p class="text-lg xl:text-xl 2xl:text-3xl uppercase mt-6">
                    <span class="relative">
                        <span class="text-brand-medium font-bold">{{ total_cost_upfront }}</span> 
                        Upfront
                        <span class="text-sm absolute -top-1 -right-1">*</span>
                    </span>
                    <span class="px-3">+</span>
                    <span class="text-brand-medium mt-4 font-bold">{{ total_cost_monthly }}</span> 
                    Monthly</p>
                </div>

                <div class="flex flex-col items-center justify-center text-center my-2">
                    <p class="text-xl xl:text-2xl 2xl:text-4xl uppercase">Or</p>
                </div>

                <div class="flex flex-col w-full lg:w-3/4 2xl:w-full items-center justify-center my-2">
                    <p class="text-lg xl:text-xl 2xl:text-3xl uppercase text-center">
                    <span class="text-xl xl:text-2xl 2xl:text-4xl text-brand-medium mt-4 font-bold">$0</span>
                    Upfront
                    <span class="px-3">+</span>
                    <span class="text-brand-medium mt-4 font-bold">{{ total_cost_monthly_financed }}</span>
                    Monthly
                    <span class="text-xs xl:text-sm 2xl:text-lg block mt-4">Financed term:
                    <select id="percents" @change="calculateUpfront(); calculateMonthly(); calculateMonthlyFinanced(); populateForm();" v-model="selected_term" class="rounded text-grey-dim border-none ring-grey-dim ring-2 focus:ring-2 focus:ring-brand-medium focus:text-brand-medium ml-4">
                        <option v-for="percent in percents" :value="percent.months">{{ percent.title }}</option>
                    </select>
                    </span>
                    </p>
                    <p class="mt-8 w-full lg:w-3/4 text-center">Please contact us to initiate a discussion with our team about the best plan for your warehouse.</p>
                </div>
            </div>
            
        </div>`,
    data: function () {
        return {
            // control
            calcReveal: false,
            formReveal: false,
            employeeMin: false,
            buttonDisabled: true,

            // base values
            total_employees: null,
            total_cost_upfront: '$',
            total_cost_monthly: '$',
            total_cost_monthly_financed: '$',
            cloud: 1,
            cloud_text: '',
            hardware: 1,
            hardware_text: '',
            selected_term: 60,
            rate: 0,
            percents: [
                { months: 12, title: '12 Months', start: '0.09152', middle: '0.09045', end: '0.09022' },
                { months: 24, title: '24 Months', start: '0.04767', middle: '0.04707', end: '0.04684' },
                { months: 36, title: '36 Months', start: '0.03271', middle: '0.03235', end: '0.03200' },
                { months: 48, title: '48 Months', start: '0.02561', middle: '0.02526', end: '0.02490' },
                { months: 60, title: '60 Months', start: '0.02122', middle: '0.02072', end: '0.02048' },
            ],

            // upfront costs
            // initial
            installation: 19500.00,
            training: 5000.00,
            gsw_licenses: 2000.00,
            // employee cost
            employee_upfront: 148.96, // per employee
            // cloud hosting cost
            cloud_upfront: 775.00,

            // monthly costs
            // each month
            host_saas: 400.01,
            admin_saas: 100.00,
            support_agreement: 416.67,
            gsw_subscription: 29.60,
            // employee cost
            employee_monthly: 75.77, // per employee
            // cloud hosting cost
            cloud_monthly: 837.00,

            // hardware costs
            // per unit
            hardware_computer: 3000.00,
            hardware_battery: 140.00,
            hardware_accessories: 130.00,

        }
    },
    methods: {
        calculateUpfront: function () {
            const INITIAL_COST_UPFRONT = this.installation + this.training + this.gsw_licenses;
            const HARDWARE_TOTAL = this.hardware_computer + this.hardware_battery + this.hardware_accessories;
            if (this.cloud == 1 && this.hardware == 1) {
                this.total_cost_upfront = ((this.employee_upfront * this.total_employees) + INITIAL_COST_UPFRONT) + this.cloud_upfront + (HARDWARE_TOTAL * this.total_employees);
                this.cloud_text = 'Cloud please';
                this.hardware_text = 'Hardware in estimate';
            } else if (this.cloud == 1) {
                this.total_cost_upfront = ((this.employee_upfront * this.total_employees) + INITIAL_COST_UPFRONT) + this.cloud_upfront;
                this.cloud_text = 'Cloud please';
                this.hardware_text = 'No hardware in estimate';
            } else if (this.hardware == 1) {
                this.total_cost_upfront = ((this.employee_upfront * this.total_employees) + INITIAL_COST_UPFRONT) + (HARDWARE_TOTAL * this.total_employees);
                this.hardware_text = 'Hardware in estimate';
                this.cloud_text = 'No cloud';
            } else {
                this.total_cost_upfront = (this.employee_upfront * this.total_employees) + INITIAL_COST_UPFRONT;
                this.cloud_text = 'No cloud';
                this.hardware_text = 'No hardware in estimate';
            }
            this.total_cost_upfront = "$ " + this.total_cost_upfront.toFixed(0).replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1,")
            if (this.total_employees >= 1) {
                this.employeeMin = true;
            } else {
                this.employeeMin = false;
            }
        },
        calculateMonthly: function () {
            const INITIAL_COST_MONTHLY = this.host_saas + this.admin_saas + this.support_agreement + this.gsw_subscription;
            if (this.cloud == 1) {
                this.total_cost_monthly = ((this.employee_monthly * this.total_employees) + INITIAL_COST_MONTHLY) + this.cloud_monthly;
            } else {
                this.total_cost_monthly = (this.employee_monthly * this.total_employees) + INITIAL_COST_MONTHLY;
            }
            this.total_cost_monthly = "$ " + this.total_cost_monthly.toFixed(0).replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1,")
        },
        calculateMonthlyFinanced: function () {
            const UPFRONT_COST = parseFloat(this.total_cost_upfront.replace(/[^\d\.]/g, ""));
            const INITIAL_COST_MONTHLY = parseFloat(this.total_cost_monthly.replace(/[^\d\.]/g, ""))
            if (UPFRONT_COST <= 24999) {
                this.rate = this.percents[findMonthId(this.selected_term)].start;
                this.total_cost_monthly_financed = (UPFRONT_COST * this.rate) + INITIAL_COST_MONTHLY;
            } else if (UPFRONT_COST <= 74999) {
                this.rate = this.percents[findMonthId(this.selected_term)].middle;
                this.total_cost_monthly_financed = (UPFRONT_COST * this.rate) + INITIAL_COST_MONTHLY;
            } else if (UPFRONT_COST >= 75000) {
                this.rate = this.percents[findMonthId(this.selected_term)].end;
                this.total_cost_monthly_financed = (UPFRONT_COST * this.rate) + INITIAL_COST_MONTHLY;
            } else {
                console.log("Monthly finance range not within scope.");
            }
                this.total_cost_monthly_financed = "$ " + this.total_cost_monthly_financed.toFixed(0).replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1,")
        },
        populateForm: function () {
            if (document.querySelector('[id^="hs-form-iframe-"]')) {
                document.querySelector('[id^="hs-form-iframe-"]').contentWindow.document.querySelectorAll('[name="number_of_employees"]')[0].value = this.total_employees;
                document.querySelector('[id^="hs-form-iframe-"]').contentWindow.document.querySelectorAll('[name="server_option"]')[0].value = this.cloud_text;
                document.querySelector('[id^="hs-form-iframe-"]').contentWindow.document.querySelectorAll('[name="hardware_option"]')[0].value = this.hardware_text;
                document.querySelector('[id^="hs-form-iframe-"]').contentWindow.document.querySelectorAll('[name="upfront_cost"]')[0].value = this.total_cost_upfront;
                document.querySelector('[id^="hs-form-iframe-"]').contentWindow.document.querySelectorAll('[name="monthly_cost"]')[0].value = this.total_cost_monthly;
                document.querySelector('[id^="hs-form-iframe-"]').contentWindow.document.querySelectorAll('[name="monthly_cost_financed"]')[0].value = this.total_cost_monthly_financed;
                document.querySelector('[id^="hs-form-iframe-"]').contentWindow.document.querySelectorAll('[name="financed_term"]')[0].value = this.selected_term;
                document.querySelector('[id^="hs-form-iframe-"]').contentWindow.document.querySelectorAll('[name="rate"]')[0].value = this.rate;
            } else {
                alert("Web form not added to calcultor, please contact your web administrator.");
            }
        },
        revealForm: function () {
            if (!this.formReveal) {
                document.getElementById('calculator-form-hb').classList.remove('hidden');
                this.formReveal = true;
            } else {
                // button should be disabled.
            }
        },
        buttonState: function () {
            this.buttonDisabled = buttonCheck(this.employeeMin, this.calcReveal);
        },
    }
});

new Vue({
    el: '#calc',
});

findMonthId = (month) => {
    var result = month / 12 - 1;
    return result
}

buttonCheck = (employee, calculated) => {
    if (employee == true && calculated == false) {
        return false;
    } else {
        return true;
    }
}