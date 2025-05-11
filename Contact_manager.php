<?php
// Contact storage (limited to 2 contacts)
$contacts = [];

function showMenu() {
    echo "\n=== Contact Management App ===\n";
    echo "1. Add Contact\n";
    echo "2. View Contacts\n";
    echo "3. Exit\n";
    echo "Select an option: ";
}

function addContact(&$contacts) {
    if (count($contacts) >= 2) {
        echo "\n⚠️ Maximum contact limit reached! You cannot add more contacts.\n";
        return;
    }

    echo "\nEnter Name: ";
    $name = trim(fgets(STDIN));
    
    echo "Enter Phone Number: ";
    $phone = trim(fgets(STDIN));

    $contacts[] = ["name" => $name, "phone" => $phone];
    echo "\n✅ Contact added successfully!\n";
}

function viewContacts($contacts) {
    echo "\n📋 Saved Contacts:\n";
    if (empty($contacts)) {
        echo "No contacts found.\n";
        return;
    }
    foreach ($contacts as $index => $contact) {
        echo ($index + 1) . ". Name: " . $contact["name"] . " | Phone: " . $contact["phone"] . "\n";
    }
}

// Main program loop
while (true) {
    showMenu();
    $choice = trim(fgets(STDIN));

    switch ($choice) {
        case "1":
            addContact($contacts);
            break;
        case "2":
            viewContacts($contacts);
            break;
        case "3":
            echo "\n🔚 Exiting... Goodbye!\n";
            exit;
        default:
            echo "\n❌ Invalid option. Please select again.\n";
    }
}
?>