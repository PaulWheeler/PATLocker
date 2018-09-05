<?php include('plugin/page_declaration.php');?>
	<title>PAT Info</title>
</head>
<body>
	<!--The title and menu start-->
	<?php
	if($_SESSION['clientIsloggedin']!='true' and $_SESSION['isloggedin']== 'true' and $_SESSION['client_id'])
	{
			include('plugin/header.php');
	}
	else
	{
		if($_SESSION['clientIsloggedin'] == 'true')
		{
			include('plugin/header.php');
		}
		else
		{
		include('plugin/header4button.php');
		}
	}
	?>
	<!--The title and menu end-->


	<p>Source <a class="normal" target="_blank" href="http://www.hse.gov.uk/electricity/faq-portable-appliance-testing.htm">http://www.hse.gov.uk/electricity/faq-portable-appliance-testing.htm</a>
	taken on 16th June 2014</p>

	<h2>What is portable appliance testing?</h2>
	<p class="left">Portable appliance testing (PAT) is the term used to describe the examination of electrical appliances and equipment
		to ensure they are safe to use. Most electrical safety defects can be found by visual examination but some types of
		defect can only be found by testing. However, it is essential to understand that visual examination is an essential part
		of the process because some types of electrical safety defect can't be detected by testing alone.
	A relatively brief user check (based upon simple training and perhaps assisted by the use of a brief checklist) can be a
	very useful part of any electrical maintenance regime. However, more formal visual inspection and testing by a competent
	person may also be required at appropriate intervals, depending upon the type of equipment and the environment in which it is used</p>

	<h2>Do I need to keep records of testing and should I label any appliances tested?</h2>
	<p class="left">There is no legal requirement to label equipment that has been inspected or tested, nor is there a requirement to keep records
		of these activities. However, a record and / or labelling can be a useful management tool for monitoring and reviewing the
		effectiveness of the maintenance scheme – and to demonstrate that a scheme exists.</p>

	<h2>Is Portable Appliance Testing (PAT) compulsory?</h2>
	<p class="left">No. The law simply requires an employer to ensure that their electrical equipment is maintained in order to prevent danger.
		It does not say how this should be done or how often. Employers should take a risk-based approach, considering the type of
		equipment and what it is being used for. If it is used regularly and moved a lot e.g. a floor cleaner or a kettle, testing
		(along with visual checks) can be an important part of an effective maintenance regime giving employers confidence that they
		are doing what is necessary to help them meet their legal duties. HSE provides guidance on how to maintain equipment including
		the use of PAT.</p>

	<h2>I've been told that, by law, I must have my portable electrical appliances tested every year. Is this correct?</h2>
	<p class="left">The Electricity at Work Regulations 1989 require that any electrical equipment that has the potential to cause injury is
		maintained in a safe condition. However, the Regulations do not specify what needs to be done, by whom or how frequently
		(ie they don't make inspection or testing of electrical appliances a legal requirement, nor do they make it a legal requirement
		to undertake this annually).</p>

	<h2>How frequently do I need to test my electrical appliances?</h2>
	<p class="left">The frequency of inspection and testing depends upon the type of equipment and the environment it is used in. For example,
		a power tool used on a construction site should be examined more frequently than a lamp in a hotel bedroom. For guidance on
		suggested frequencies of inspection and testing, see: Maintaining portable and transportable electrical equipment.</p>

	<h2>Do I need to keep records of testing and should I label any appliances tested?</h2>
	<p class="left">There is no legal requirement to label equipment that has been inspected or tested, nor is there a requirement to keep records
		of these activities. However, a record and / or labelling can be a useful management tool for monitoring and reviewing the
		effectiveness of the maintenance scheme – and to demonstrate that a scheme exists.</p>

	<h2>Do I need to test new equipment?</h2>
	<p class="left">New equipment should be supplied in a safe condition and not require a formal portable appliance inspection or test. However,
		a simple visual check is recommended to verify the item is not damaged.</p>

	<h2>I have been told that I have to get an electrician to do portable appliance testing work. Is that correct?</h2>
	<p class="left">The person doing testing work needs to competent to do it. In many low-risk environments, a sensible (competent) member of
		staff can undertake visual inspections if they have enough knowledge and training. However, when undertaking combined inspection
		and testing, a greater level of knowledge and experience is needed, and the person will need:</p>
		<ul class="left">
			<li>the right equipment to do the tests</li>
			<li>the ability to use this test equipment properly</li>
			<li>the ability to properly understand the test results</li>
		</ul>



	<h2>I run a tool hire business? What do I need to do and are there additional responsibilities for the person hiring my tools?</h2>
	<p class="left">It is strongly recommended that equipment suppliers formally inspect and test the equipment before each hire, in order to ensure
		it is safe to use. The person hiring the equipment should also take appropriate steps to ensure it remains safe to use throughout
		the hire period. The question 'What is portable appliance testing?' above gives guidance on what this will entail.</p>

	<h2>Are there are any case studies about portable appliance testing?</h2>
	<h3>A high street travel agent's approach to PAT</h3>
	<p class="left">A high street travel agency thought about what it needed to do to maintain its portable electrical equipment. As their work
		generally included office work and dealing with customers the manager considered that health and safety risks would be generally low.
		 The portable electrical equipment was used in a clean and dry shop by a small number of employees. In deciding what action was needed:
	the manager thought about the type of portable equipment that was used in their shop and the level of risk that it might create;
	she looked for electrical equipment in the shop and found that there were a number of computers, a fax, two printers and a vacuum cleaner;
	she then thought about the likelihood that the items could become damaged:
	Computers, printers and faxes were not moved around much and were positioned so that the cables could not become trapped, so the probability
	that items might be damaged was extremely low. The manager decided that they would be maintained by a visual inspection every 5 years.
	The vacuum cleaner was heavily used. The manager remembered that the cable was repaired 6 months ago by an electrician as it had been pulled
	out of the cable grip, so she knew that in future it would need to be looked at more often. It was decided that the vacuum should have a
	visual inspection every 6 months and that employees would be encouraged to look for signs of damage to the plug and cable before plugging it in.
	The manager kept a note of the checks in her diary to remind herself to re-inspect the equipment.
	Only the vacuum cleaner was thought to present a high risk, so the manager decided to get this tested after twelve months and review this after 24 months.
	None of the remaining equipment in use was thought to present a high risk, so the manager decided that full portable appliance testing was not needed for these items.</p>
	<h3>Key Points:</h3>
	<p class="left">Portable electrical equipment must be maintained to prevent danger.
	For most portable electrical equipment in a low-risk workplace, a portable appliance test is not needed.
	Working out what you have to do is not time consuming or complicated.
	Simply looking for signs of damage is a good way of Maintaining portable electric equipment.
	HSE's approach to maintaining portable appliances in its own offices
	In 2011, the HSE reviewed its approach to portable appliance maintenance in its own offices. Thinking about the type of equipment in use, and how it was used, the HSE looked back at the results from its annual testing of portable appliances across its estate over the last five years. Using the results of the previous tests, the HSE decided that further portable appliance tests are not needed within the foreseeable future or at all for certain types of portable equipment. Also, they decided to continue to monitor any faults reported as a result of user checks and visual inspections and review its maintenance system if evidence suggests that it needs revising. Electrical equipment will continue to be maintained by a series of user checks and visual inspections by staff that have had some training.
	Key Points:
	Annual portable appliance testing is not always necessary in low risk environments
	You do not need to be an electrician to carry out visual inspections
	Low cost user checks and visual inspections are a good method of Maintaining portable electric equipment</p>


			<!-- Insert code here -->

		<?php include('plugin/footer.php'); ?>
	</div>
</body>
</html>
