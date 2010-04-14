/* Date slider element, Ajaxorized.com,  2008 */
var sliderReference;

/* Extend the data element a bit */
Date.prototype.getDiffDays = function(p_oDate) {
	p_iOneDay = 1000*60*60*24;
	return Math.ceil((p_oDate.getTime()-this.getTime())/(p_iOneDay));
}

/* The dateslider */
DateSlider = Class.create({
	initialize : function(p_sBarId, p_sStartDate, p_sEndDate, p_iStartYear, p_iEndYear) {
		/* Start */
		this.barStartDate = Date.parse(p_iStartYear+'-01-01');

		this.iStartYear = p_iStartYear;
		this.iEndYear = p_iEndYear;

		/* Panel dates */
		this.oStartDate = Date.parse(p_sStartDate);
		this.oEndDate = Date.parse(p_sEndDate);

		/* The fields (set later) */
		this.oStartField = null;
		this.oEndFiedl = null;

		sliderReference = this;

		this.sliderBarMargin = 2;

		l_oStartDate = Date.parse(p_sStartDate);
		l_oEndDate = Date.parse(p_sEndDate);

		this.iLeftOffsetLH = this.barStartDate.getDiffDays(l_oStartDate);
		this.iLeftOffsetRH = this.barStartDate.getDiffDays(l_oEndDate);

		this.dayDivWidth = 1;
		this.createSliderBar(p_sBarId);
		this.createHandles(p_sBarId, p_sStartDate, p_sEndDate);
		this.createShiftPanel(p_sBarId, p_sStartDate, p_sEndDate);
	},
	createSliderBar : function(p_sBarId) {
		/* Create the yearlabels */
		var sliderDayDivWidth = this.dayDivWidth;

		l_iYear = this.iStartYear;
		while(l_iYear <= this.iEndYear) {
			l_oData = Date.parse('01-01-'+l_iYear);
			if(l_oData.isLeapYear()) iDays = 366; else iDays = 365;

			divWidth = sliderDayDivWidth*iDays;
			l_oDiv = $(Builder.node('div', {className : 'slideYear', style : 'width:'+(divWidth-1)+'px'})).update(l_iYear);

			iTotalDays = 0;
			(12).times(function(e) {
				monthDivWidth = l_oData.getDaysInMonth();
				l_oMonthDiv = Builder.node('div', {className : 'slideMonth',style : 'width:'+(monthDivWidth)+'px; left:'+iTotalDays+'px'});
				if(e==0) {
					$(l_oMonthDiv).addClassName('firstMonth');
				} else {
					$(l_oMonthDiv).update(l_oData.toString("MMM"));
				}
				l_oDiv.appendChild(l_oMonthDiv);
				iTotalDays += monthDivWidth;
				l_oData.addMonths(1);
			});
			$(p_sBarId).appendChild(l_oDiv);
			l_iYear++;
		}

		/* Set the the right position and length */

		l_iCorrection = $('slider-container').offsetWidth/2;
		l_shiftLeft = 0-(this.barStartDate.getDiffDays(Date.today()))+l_iCorrection;
		l_oFinishDate = Date.parse((this.iEndYear+1)+'-01-01');
		iBarWidth =this.barStartDate.getDiffDays(l_oFinishDate);
	 	$('sliderbar').setStyle({left : l_shiftLeft+'px', width : iBarWidth+'px'});
		new Draggable($(p_sBarId), {constraint:'horizontal', starteffect : '', endeffect:'', zindex:'0'});
	},
	createHandles : function(p_sBarId, p_sStartDate, p_sEndDate) {
		/* Calculate positions */
		l_oLeftHandle = $(Builder.node('span', {id : 'lefthandle', style:'left:'+this.iLeftOffsetLH+'px'})).update('&nbsp;');
		l_oRightHandle = $(Builder.node('span', {id : 'righthandle', style:'left:'+this.iLeftOffsetRH+'px'})).update('&nbsp;');

		$(p_sBarId).appendChild(l_oLeftHandle);
		$(p_sBarId).appendChild(l_oRightHandle);

		new Draggable(l_oLeftHandle,  {constraint:'horizontal', onDrag :  sliderReference._leftDrag, onEnd : sliderReference._leftDrag});


		new Draggable(l_oRightHandle,  {constraint:'horizontal', onDrag : sliderReference._rightDrag, onEnd : sliderReference._rightDrag });
	},
	createShiftPanel : function(p_sBarId, p_sStartDate, p_sEndDate) {
		/* Calculate width */
		l_iBarWidth = (this.iLeftOffsetRH-this.iLeftOffsetLH)+(2*this.sliderBarMargin);

		l_oShiftPanel = $(Builder.node('div', {id : 'shiftpanel', style:'left:'+(this.iLeftOffsetLH)+'px; width:'+l_iBarWidth+'px'}));
		$(p_sBarId).appendChild(l_oShiftPanel);
		new Draggable(l_oShiftPanel, {constraint:'horizontal', starteffect : '', endeffect:'', zindex:'0', onDrag : function() {
															/* Set the handlers while dragging the shiftpanel */
															$('lefthandle').setStyle({left: ($('shiftpanel').offsetLeft-sliderReference.sliderBarMargin)+'px'});
															$('righthandle').setStyle({left: ($('shiftpanel').offsetLeft + $('shiftpanel').offsetWidth-sliderReference.sliderBarMargin)+'px'});
															sliderReference._setDates();
															}});
	},
	_setDates : function() {
		/* Get the position of the handles */
		l_iLeftPos = $('lefthandle').offsetLeft;
		l_iRightPos = $('righthandle').offsetLeft;

		l_oDate = this.barStartDate.clone().addDays(l_iLeftPos);
		l_oDate2 = this.barStartDate.clone().addDays(l_iRightPos);

		if(this.oStartField && this.oEndField) {
			this.oStartField.setValue(l_oDate.toString('yyyy-M-d'));
			this.oEndField.setValue(l_oDate2.toString('yyyy-M-d'));
            this.oStartNice.innerHTML = l_oDate.toString('dddd, d MMMM yyyy');
            this.oEndNice.innerHTML = l_oDate2.toString('dddd, d MMMM yyyy');
		}

	},
	_rightDrag : function () {
		l_panelLength = $('righthandle').offsetLeft - $('lefthandle').offsetLeft - 5;
		$('shiftpanel').setStyle({width : (l_panelLength+2*sliderReference.sliderBarMargin)+'px'});
		sliderReference._setDates();
	},
	_leftDrag : function() {
		l_panelLength = $('righthandle').offsetLeft - $('lefthandle').offsetLeft - 4;
		$('shiftpanel').setStyle({left: ($('lefthandle').offsetLeft+4)+'px', width : l_panelLength+'px'});
		sliderReference._setDates();
	},
	morphTo : function (p_oDateStart, p_oDateEnd) {
		l_offsetLeftLH = this.barStartDate.getDiffDays(l_oStartDate);
		l_offsetLeftRH = this.barStartDate.getDiffDays(p_oDateEnd);
		l_panelLength = l_offsetLeftRH - l_offsetLeftLH  - 4;
		$('lefthandle').morph('left:'+l_offsetLeftLH+'px');
		$('righthandle').morph('left:'+l_offsetLeftRH+'px');
		$('shiftpanel').morph('width : '+(l_panelLength+2*sliderReference.sliderBarMargin)+'px; left : '+(l_offsetLeftLH+2)+'px');
	},
	attachFields : function (p_oStartField, p_oEndField, startNice, endNice) {
        this.oStartNice = startNice;
		this.oEndNice = endNice;

        startNice.innerHTML = this.oStartDate.toString('dddd, d MMMM yyyy');
		endNice.innerHTML = this.oEndDate.toString('dddd, d MMMM yyyy');

        this.oStartField = p_oStartField;
		this.oEndField = p_oEndField;

		p_oStartField.setValue(this.oStartDate.toString('yyyy-M-d'));
		p_oEndField.setValue(this.oEndDate.toString('yyyy-M-d'));

		p_oStartField.observe('blur', function(e) {
			/* Morph to the new date */
			l_oStartDate = Date.parse(p_oStartField.getValue());
			l_oEndDate = Date.parse(p_oEndField.getValue());
			sliderReference.morphTo(l_oStartDate, l_oEndDate);
            sliderReference.oStartNice.innerHTML = l_oStartDate.toString('dddd, d MMMM yyyy');
            sliderReference.oEndNice.innerHTML = l_oEndDate.toString('dddd, d MMMM yyyy');
		});

		p_oEndField.observe('blur', function(e) {
			/* Morph to the new date */
			l_oStartDate = Date.parse(p_oStartField.getValue());
			l_oEndDate = Date.parse(p_oEndField.getValue());
			sliderReference.morphTo(l_oStartDate, l_oEndDate);
            sliderReference.oStartNice.innerHTML = l_oStartDate.toString('dddd, d MMMM yyyy');
            sliderReference.oEndNice.innerHTML = l_oEndDate.toString('dddd, d MMMM yyyy');
		});

	}
});
