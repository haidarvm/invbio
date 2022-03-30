// The autoComplete.js Engine instance creator
const autoCompleteJS = new autoComplete({
	data: {
		src: async () => {
			try {
				// Loading placeholder text
				document
					.getElementById("autoComplete")
					.setAttribute("placeholder", "Loading...");
				// Fetch External Data Source
				const source = await fetch(
					base_url + "api/auto_item"
				);
				const data = await source.json();
				// Post Loading placeholder text
				document
					.getElementById("autoComplete")
					.setAttribute("placeholder", autoCompleteJS.placeHolder);
				// Returns Fetched data
				return data;
			} catch (error) {
				return error;
			}
		},
		keys: ["item_name"],
		cache: true,
		filter: (list) => {
			// Filter duplicates
			// incase of multiple data keys usage
			const filteredResults = Array.from(
				new Set(list.map((value) => value.match))
			).map((item_name) => {
				return list.find((value) => value.match === item_name);
			});

			return filteredResults;
		}
	},
	placeHolder: "Cari Barang!",
	resultsList: {
		element: (list, data) => {
			const info = document.createElement("p");
			if (data.results.length > 0) {
				info.innerHTML = `Displaying <strong>${data.results.length}</strong> out of <strong>${data.matches.length}</strong> results`;
			} else {
				info.innerHTML = `Found <strong>${data.matches.length}</strong> matching results for <strong>"${data.query}"</strong>`;
			}
			list.prepend(info);
		},
		noResults: true,
		maxResults: 15,
		tabSelect: true
	},
	resultItem: {
		element: (item, data) => {
			// Modify Results Item Style
			item.style = "display: flex; justify-content: space-between;";
			// Modify Results Item Content
			item.innerHTML = `
      <span style="text-overflow: ellipsis; white-space: nowrap;  width:800px">
        ${data.match}
      </span>`;
		},
		// <span style="display: flex; align-items: center; font-size: 13px; font-weight: 100; text-transform: uppercase; color: rgba(0,0,0,.2);width:1000px;"> ${data.value.category_name}</span>
		highlight: true
	},
	events: {
		input: {
			focus: () => {
				if (autoCompleteJS.input.value.length) autoCompleteJS.start();
			}
		}
	}
});

// autoCompleteJS.input.addEventListener("init", function (event) {
//   console.log(event);
// });

// autoCompleteJS.input.addEventListener("response", function (event) {
//   console.log(event.detail);
// });

// autoCompleteJS.input.addEventListener("results", function (event) {
//   console.log(event.detail);
// });

// autoCompleteJS.input.addEventListener("open", function (event) {
//   console.log(event.detail);
// });

// autoCompleteJS.input.addEventListener("navigate", function (event) {
//   console.log(event.detail);
// });

autoCompleteJS.input.addEventListener("selection", function (event) {
	const feedback = event.detail;
	autoCompleteJS.input.blur();
	// Prepare User's Selected Value
	const selection = feedback.selection.value[feedback.selection.key];
	// Render selected choice to selection div
	// document.querySelector(".selection").innerHTML = selection;
	// Replace Input value with the selected value
	autoCompleteJS.input.value = selection;
	// Console log autoComplete data feedback
    $('input:hidden[name=item_id]').val(feedback.selection.value.item_id);
	console.log(feedback.selection.value.item_id);
    
});

// autoCompleteJS.input.addEventListener("close", function (event) {
//   console.log(event.detail);
// });



// Blur/unBlur page elements
// const action = (action) => {
// 	const title = document.querySelector("h1");
// 	const mode = document.querySelector(".mode");
// 	const selection = document.querySelector(".selection");
// 	const footer = document.querySelector(".footer");

// 	if (action === "dim") {
// 		title.style.opacity = 1;
// 		mode.style.opacity = 1;
// 		selection.style.opacity = 1;
// 	} else {
// 		title.style.opacity = 0.3;
// 		mode.style.opacity = 0.2;
// 		selection.style.opacity = 0.1;
// 	}
// };

// Blur/unBlur page elements on input focus
["focus", "blur"].forEach((eventType) => {
	autoCompleteJS.input.addEventListener(eventType, () => {
		// Blur page elements
		// if (eventType === "blur") {
		// 	action("dim");
		// } else if (eventType === "focus") {
		// 	// unBlur page elements
		// 	action("light");
		// }
	});
});
