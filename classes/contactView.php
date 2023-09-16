<?php 

	class contactView extends Contact {

		public function showContactMessages() {
			$results = $this->getAllContacts();
			foreach ($results as $result) {
				$token = $result['contact_id'];
				$token = md5($token);
				$name = $result['contact_name'];
				$email = $result['contact_email'];
				$phone = $result['contact_phone'];
				$message = $result['contact_message'];

				echo '<tr>
                            <td>
                              '.$name.'
                            </td>
                            <td>
                              '.$email.'
                            </td>
                            <td>
                              '.$phone.'
                            </td>
                            <td>
                              <a href="contact.php?read_contact='.$token.', '.$name.', '.$email.', '.$phone.', '.$message.'" class="badge badge-gradient-success">Read</a>
                            </td>
                            <td>
                              <a href="delete_contact.php?del_contact='.$token.', '.$name.', '.$email.', '.$phone.', '.$message.'" class="badge badge-gradient-danger">Delete</a>
                            </td>
                          </tr>';
			}
		}

	}