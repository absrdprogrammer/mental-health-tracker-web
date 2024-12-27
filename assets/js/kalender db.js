document.addEventListener("DOMContentLoaded", () => {
	const calendarGrid = document.getElementById("calendarGrid");
	const currentMonthYear = document.getElementById("currentMonthYear");
	const prevMonthBtn = document.getElementById("prevMonth");
	const nextMonthBtn = document.getElementById("nextMonth");

	let currentDate = new Date();

	function renderCalendar(date) {
		const year = date.getFullYear();
		const month = date.getMonth();
		const firstDay = new Date(year, month, 1).getDay();
		const daysInMonth = new Date(year, month + 1, 0).getDate();

		currentMonthYear.textContent = `${date.toLocaleString("default", {
			month: "long",
		})} ${year}`;

		calendarGrid.innerHTML = "";

		// Add day labels
		const dayLabels = ["S", "M", "T", "W", "T", "F", "S"];
		dayLabels.forEach((label) => {
			const dayLabel = document.createElement("div");
			dayLabel.classList.add("day-label");
			dayLabel.textContent = label;
			calendarGrid.appendChild(dayLabel);
		});

		// Add empty slots for days before the first of the month
		for (let i = 0; i < firstDay; i++) {
			const emptySlot = document.createElement("div");
			emptySlot.classList.add("day", "empty");
			calendarGrid.appendChild(emptySlot);
		}

		// Add days of the month
		for (let day = 1; day <= daysInMonth; day++) {
			const dayElement = document.createElement("div");
			dayElement.classList.add("day");
			dayElement.textContent = day;

			// Highlight today's date
			const today = new Date();
			if (
				day === today.getDate() &&
				month === today.getMonth() &&
				year === today.getFullYear()
			) {
				dayElement.classList.add("active");
			}

			calendarGrid.appendChild(dayElement);
		}
	}

	function navigateMonth(offset) {
		currentDate.setMonth(currentDate.getMonth() + offset);
		renderCalendar(currentDate);
	}

	// Event listeners for navigation buttons
	prevMonthBtn.addEventListener("click", () => navigateMonth(-1));
	nextMonthBtn.addEventListener("click", () => navigateMonth(1));

	// Initial render
	renderCalendar(currentDate);
});
