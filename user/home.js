$(document).ready(function () {
    $("#major").change(function () {
        updateToHop();
    });
});

function updateToHop() {
    var selectedMajor = $("#major").val();
    var tohopSelect = $("#tohop");
    tohopSelect.empty();

    if (selectedMajor === "7220201" || selectedMajor === "7810103" || selectedMajor === "7810201" || selectedMajor === "7380101" || selectedMajor === "7340301" || selectedMajor === "7340201" || selectedMajor === "7340101" || selectedMajor === "7340109") {
        addOption(tohopSelect, "---Vui lòng chọn---", "");
        addOption(tohopSelect, "A00", "A00");
        addOption(tohopSelect, "A01", "A01");
        addOption(tohopSelect, "C00", "C00");
        addOption(tohopSelect, "D01", "D01");
    } else if (selectedMajor === "7510206" || selectedMajor === "7480201" || selectedMajor === "7510202" || selectedMajor === "7510205" || selectedMajor === "7510301" || selectedMajor === "7510303" || selectedMajor === "7580210") {
        addOption(tohopSelect, "---Vui lòng chọn---", "");
        addOption(tohopSelect, "A00", "A00");
        addOption(tohopSelect, "A01", "A01");
        addOption(tohopSelect, "C01", "C01");
        addOption(tohopSelect, "D01", "D01");
    } else if (selectedMajor === "7540101" || selectedMajor === "7720201" || selectedMajor === "7720301") {
        addOption(tohopSelect, "---Vui lòng chọn---", "");
        addOption(tohopSelect, "A00", "A00");
        addOption(tohopSelect, "A02", "A02");
        addOption(tohopSelect, "B00", "B00");
        addOption(tohopSelect, "D07", "D07");
    }
}

function addOption(selectElement, text, value) {
    var option = $("<option></option>").text(text).val(value);
    selectElement.append(option);
}