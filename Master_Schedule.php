
<?php

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <style>
   
    label.checkbox-label {
      display: flex;
      align-items: center;
    }
    input[type="checkbox"] {
      margin-right: 5px;
    }

    #createdSchedule {
      margin-top: 20px;
    }

    .scheduleItem {
      border: 1px solid #ccc;
      padding: 10px;
      margin-bottom: 10px;
      background-color: #f9f9f9;
      border-radius: 5px;
    }

    .scheduleItem p {
      margin: 0;
    }

    body {
      background-color: #f5f5f5;
      margin: 0;
      padding: 0;
    }

    /* Add your existing styles here */
    .top-section {
      margin-left: 200px;
      background-color: #ffc21c;
      display: flex;
      align-items: center;
      margin: auto;
      flex-direction: row;
      width: 1366px;
    }

    .top-section-description {
      width: 500px;
      display: inline-block;
    }

    .clubClick {
      margin-right: 50px;
      color: #f5f5f5;
      background-color: gray;
      font-size: 20px;
      padding: 10px;
      border-radius: 25px;
      border: none;
      box-shadow: 0px 2px 10px 0px rgba(41, 41, 41, 0.3);
    }

    .eventClick {
      color: #f5f5f5;
      background-color: gray;
      font-size: 20px;
      padding: 10px;
      border-radius: 25px;
      border: none;
      box-shadow: 0px 2px 10px 0px rgba(41, 41, 41, 0.3);
    }

    .top-section-image {
      background-color: orange;
      display: inline-block;
      width: 766px;
      vertical-align: top;
    }

    .img-containter {
      background-color: green;
      width: 866px;
      height: 516px;
    }

    .img-containter img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .keyInfo {
      margin-left: 200px;
      background-color: #006f71;
      height: 100px;
      display: flex;
      align-items: center;
      margin: auto;
      flex-direction: row;
      justify-content: space-between;
      width: 1366px;
    }

    .detailedInfo {
      padding-left: 10px;
      padding-right: 10px;
      text-align: center;
      width: 250px;
      gap: 10px;
      color: #f5f5f5;
    }

    .detailedInfo p {
      font-size: 18px;
    }

    .bottom-section-description {
      width: 1366px;
      margin-left: 200px;
      margin-top: 20px;
    }

    .sele {
      max-width: 1366px;
      position: relative;
      align-items: center;
      margin: auto;
      padding-bottom: 20px;
    }

    .events-Gridrr {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      column-gap: 25px;
      row-gap: 25px;
      max-width: 1366px;
      position: relative;
      align-items: center;
      margin: auto;
      padding-bottom: 20px;
    }

    .EventContainerrr {
      height: 260px;
      width: 310px;
      background-color: #DDE5E3;
      padding: 10px;
      box-shadow: 0px 4px 10px 0px rgba(0, 0, 0, 0.31);
    }

    .coverrr {
      display: flex;
      justify-content: center;
    }

    .coverrr img {
      height: 150px;
      width: 310px;
      background-color: black;
      object-fit: cover;
    }

    .eventDescriptionrr {
      background-color: rgb(255, 255, 255);
      display: flex;
      height: 110px;
      text-align: justify;
    }

    .eventDescriptionrr h1 {
      text-align: center;
    }

    .textrr {
      margin: auto;
      width: 275px;
      margin-left: 15px;
      margin-top: 0px;
      height: 80px;
      font-size: 12px;
    }

    .Titlerr {
      font-size: 15px;
    }

    .descriptrrr {
      margin-top: -5px;
    }
  </style>
</head>

<body>
  <h1>Build a Schedule</h1>

  <form id="scheduleForm">
    <label for="courseName">Course Name:</label>
    <input type="text" id="courseName" name="courseName" required>

    <label for="courseCode">Course Code:</label>
    <input type="text" id="courseCode" name="courseCode" required>

    <label for="day">Day:</label>
    <div id="dayCheckboxes">
      <label class="checkbox-label"><input type="checkbox" name="selectedDays[]" value="monday"> Monday</label>
      <label class="checkbox-label"><input type="checkbox" name="selectedDays[]" value="tuesday"> Tuesday</label>
      <label class="checkbox-label"><input type="checkbox" name="selectedDays[]" value="wednesday"> Wednesday</label>
      <label class="checkbox-label"><input type="checkbox" name="selectedDays[]" value="thursday"> Thursday</label>
      <label class="checkbox-label"><input type="checkbox" name="selectedDays[]" value="friday"> Friday</label>
    </div>

    <label for="semester">Semester:</label>
    <select id="semester" name="semester" required>
      <option value="fall">Fall</option>
      <option value="spring">Spring</option>
      <option value="summer">Summer</option>
      <option value="winter">Winter</option>
    </select>

    <button type="button" id="showDatesButton">Show Semester Dates</button>

    <label for="startTime">Start Time:</label>
    <input type="time" id="startTime" name="startTime" required>

    <label for="endTime">End Time:</label>
    <input type="time" id="endTime" name="endTime" required>

    <label for="professorName">Professor Name:</label>
    <input type="text" id="professorName" name="professorName" required>

    <button type="submit">Add to Schedule</button>
  </form>

  <!-- Display the created schedule here -->
  <div id="createdSchedule">
    <h2>Created Schedule</h2>
    <!-- Display the schedule here dynamically using JavaScript -->
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const scheduleForm = document.getElementById('scheduleForm');
      const createdSchedule = document.getElementById('createdSchedule');
      const semesterDates = {
        fall: { start: new Date(2023, 8, 1), end: new Date(2023, 11, 31) },
        spring: { start: new Date(2023, 2, 1), end: new Date(2023, 5, 31) },
        summer: { start: new Date(2023, 5, 1), end: new Date(2023, 7, 31) },
        winter: { start: new Date(2023, 0, 1), end: new Date(2023, 1, 28) }
      };

      document.getElementById('showDatesButton').addEventListener('click', function () {
        const selectedSemester = document.getElementById('semester').value;
        const semesterStartDate = semesterDates[selectedSemester].start.toLocaleDateString();
        const semesterEndDate = semesterDates[selectedSemester].end.toLocaleDateString();
        alert(`Semester Dates: ${semesterStartDate} to ${semesterEndDate}`);
      });

      scheduleForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const courseName = document.getElementById('courseName').value;
        const courseCode = document.getElementById('courseCode').value;
        const selectedDays = Array.from(document.querySelectorAll('#dayCheckboxes input[type="checkbox"]'))
                            .filter(checkbox => checkbox.checked)
                            .map(checkbox => checkbox.value);
        const semester = document.getElementById('semester').value;
        const startTime = document.getElementById('startTime').value;
        const endTime = document.getElementById('endTime').value;
        const professorName = document.getElementById('professorName').value;

        // Validate end time is at least 30 minutes after the start time
        const startDateTime = new Date(`2000-01-01T${startTime}`);
        const endDateTime = new Date(`2000-01-01T${endTime}`);
        const timeDifference = (endDateTime - startDateTime) / (1000 * 60); // in minutes

        if (timeDifference < 30) {
          alert('End time must be at least 30 minutes after the start time.');
          return;
        }

        const semesterStartDate = semesterDates[semester].start.toLocaleDateString();
        const semesterEndDate = semesterDates[semester].end.toLocaleDateString();

        const scheduleItem = document.createElement('div');
        scheduleItem.classList.add('scheduleItem');
        scheduleItem.innerHTML = `
          <p><strong>Course:</strong> ${courseName} (${courseCode})</p>
          <p><strong>Days:</strong> ${selectedDays.join(', ')}</p>
          <p><strong>Professor:</strong> ${professorName}</p>
          <p><strong>Semester:</strong> ${semester}</p>
          <p><strong>Time:</strong> ${startTime} to ${endTime}</p>
          <p><strong>Semester Dates:</strong> ${semesterStartDate} to ${semesterEndDate}</p>
        `;

        createdSchedule.appendChild(scheduleItem);

        
      });
    });
  </script>
</body>
</html>
