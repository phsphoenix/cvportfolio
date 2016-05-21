<?php

namespace Jessica\Portfolio\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class PortfolioProfileController extends Controller
{
    public function indexAction($username = null, $url = 'public', $section = null) {
        if ($username == null) {
            return $this->redirectToRoute('web_home');
        }

        $variables = array();

        $em = $this->getDoctrine()->getManager();

        $user = $this->get('fos_user.user_manager')->findUserByUsername($username);

        $profile = $em->getRepository('JessicaPortfolioDataBundle:PortfolioProfile')->findOneBy(array('user' => $user, 'url' => $url));

        if ($profile == null) {
            if ($url !== 'public') {
                return $this->redirectToRoute('web_home', array('username' => $username, $url => 'public'));
            }
            else {
                throw $this->createNotFoundException("Profile does not exist!");
            }
        }

        $personalContactInformation = $em->getRepository('JessicaPortfolioDataBundle:PersonalContactInformation')->findOneBy(array('user' => $user));

        if ($personalContactInformation == null) {
            throw $this->createNotFoundException("Invalid contact information for user! ");
        }

        //$variables['contact'] = array();
        $variables['user'] = array();
        $variables['user']['username'] = $user->getUsername();
        $variables['user']['firstName'] = $personalContactInformation->getFirstName();
        $variables['user']['lastName'] = $personalContactInformation->getLastname();
        $variables['user']['email'] = $personalContactInformation->getEmail();
        $variables['profile'] = $profile->getName();
        //$variables['user'] = array();
        //$variables['user']['username'] = $user->getUsername();


        $portfolioProfileSection = null;

        if ($section == null) {
            $portfolioProfileSection = $em->getRepository('JessicaPortfolioDataBundle:PortfolioProfileSection')->findOneBy(array('profile' => $profile, 'displayOrder' => 0));
        }
        else {

            $portfolioSectionD = $em->getRepository('JessicaPortfolioDataBundle:PortfolioSection')->findOneBy(array('slug' => $section));

            if ($portfolioSectionD == null) {
                throw $this->createNotFoundException("Invalid Profile Section!");
            }

            $portfolioProfileSection = $em->getRepository('JessicaPortfolioDataBundle:PortfolioProfileSection')->findOneBy(array('profile' => $profile, 'section' => $portfolioSectionD));
        }

        if ($portfolioProfileSection == null) {
            throw $this->createNotFoundException("Invalid Profile Section!");
        }

        $portfolioSection = $portfolioProfileSection->getSection();

        if ($portfolioSection == null) {
            throw $this->createNotFoundException("Invalid Profile Section!");
        }

        $variables['active'] = $portfolioSection->getName();

        $portfolioProfileSections = $em->getRepository('JessicaPortfolioDataBundle:PortfolioProfileSection')->findBy(array('profile' => $profile), array('displayOrder' => 'ASC'));

        $sections = array();

        foreach($portfolioProfileSections as $portfolioProfileSectionB) {
            array_push($sections, $portfolioProfileSectionB->getSection()->getName());
        }

        // For menus
        $variables['sections'] = $sections;

        $slug = $portfolioSection->getSlug();

        if ($slug === 'statement') {
            $profilePersonalStatement = $em->getRepository('JessicaPortfolioDataBundle:ProfilePersonalStatement')->findOneBy(array('profile' => $profile));

            if ($profilePersonalStatement == null) {
                throw $this->createNotFoundException("Personal statement not found for user ".$user->getUsername());
            }
            else {
                $personalStatement = $profilePersonalStatement->getPersonalStatement();

                if ($personalStatement == null) {
                    $variables['statement'] = null;
                }
                else {
                    $variables['statement'] = $personalStatement->getContents();
                }

                //return $this->render('JessicaPortfolioWebBundle:PortfolioProfile:statement.html.twig', $variables);

                $response = new JsonResponse();
                $response->setData($variables);
                return $response;
            }
        } // End if ($slug === 'statement')

        if ($slug === 'experience') {
            $profilePositionEntries = $em->getRepository('JessicaPortfolioDataBundle:ProfilePositionEntry')->findBy(array('profile' => $profile), array('displayOrder' => 'ASC'));

            if ($profilePositionEntries == null) {
                $variables['positions'] = null;
            }
            else {
                $positionEntries = array();

                foreach($profilePositionEntries as $profilePositionEntry) {
                    $positionEntry = $profilePositionEntry->getPositionEntry();

                    $entry = array();
                    $entry['title'] = $positionEntry->getTitle();
                    $entry['organization'] = $positionEntry->getOrganization()->getName();
                    $entry['startDate'] = $positionEntry->getStartDate();
                    $entry['endDate'] = $positionEntry->getEndDate();
                    $entry['description'] = $positionEntry->getDescription();

                    array_push($positionEntries, $entry);
                }

                $variables['positions'] = $positionEntries;
            }

            //return $this->render('JessicaPortfolioWebBundle:PortfolioProfile:experience.html.twig', $variables);

            $response = new JsonResponse();
            $response->setData($variables);
            return $response;
        } // End if ($slug === 'experience')
    }
}
